<?php

namespace App\Services\Utils;


use App\Services\Utils\StarWarsInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\ORMException;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Utils implements StarWarsInterface
{

    public function __construct(
        private readonly EntityManagerInterface       $entityManager,
        private readonly ContainerInterface           $container,
        private readonly SerializerInterface          $serializer,
        private readonly HttpClientInterface          $client
    )
    {
    }


    /**
     * @param mixed $data
     * @param string $type
     * @param array $context
     * @return string
     */
    public function serialize(mixed $data, string $type, $context = []): string
    {
        return $this->serializer->serialize($data, $type, $context);
    }

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    /**
     * @param string $entityClass
     * @return EntityRepository
     */
    public function getRepository(string $entityClass): EntityRepository
    {
        return $this->entityManager->getRepository($entityClass);
    }

    /**
     * Gets the service class for the given id from Container
     *
     * @param string $id The service Id
     *
     * @return object|null The service class
     *
     * @throws InvalidArgumentException if the service is not defined
     */
    public function getService(string $id): ?object
    {
        return $this->container->get($id);
    }

    /**
     * @param $object
     * @return mixed
     * @throws ORMException
     */
    public function save($object): mixed
    {
        $em = $this->entityManager;

        if ($object->getId() === null) {
            $em->persist($object);
        }

        $em->flush();

        return $object;
    }

    /**
     * @param $object
     * @return bool
     */
    public function remove($object): bool
    {
        $em = $this->entityManager;

        $em->remove($object);
        $em->flush();

        return true;
    }

    /**
     * @param string $content
     * @param string $logFile
     * @param string $messageLevel
     * @param bool $pushMessage
     * @return void
     */
    public function writeLog(string $content,
                             string $logFile,
                             string $messageLevel,
                             bool $pushMessage)
    {
        $rootDir = $this->getParameter('root_dir');

        $logger = new SLogger($rootDir);

        $logger->writeLog($content, $logFile, $messageLevel, $pushMessage);
    }

    /**
     * @param string $name
     * @return array|bool|float|int|string|UnitEnum|null
     */
    public function getParameter(string $name): UnitEnum|float|array|bool|int|string|null
    {
        return $this->container->getParameter($name);
    }

    /**
     * @param array $data
     * @param string $type
     * @param string $format
     * @param array $options
     * @return array|object
     */
    public function deserialize(array $data, string $type, string $format = 'json', array $options = []): array|object
    {
        return $this->serializer->deserialize(
            json_encode($data),
            $type,
            $format,
            $options
        );
    }

    /**
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     */
    public function fetchUrlToArray(string $url): array
    {
        $content = [];
        $response = $this->client->request(
            'GET',
            $url,
            [
                'verify_peer' => false,
                'buffer' => false,
                'timeout' => 1000
            ]
        );

        if ($response->getStatusCode() == 200) {
            $content = $response->toArray();
        }

        return $content;
    }


}
