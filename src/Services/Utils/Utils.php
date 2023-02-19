<?php

namespace App\Utils;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;

class Utils extends AbstractController
{

    public const FILES_PENDING = 'Pending';
    public const FILES_PROCESSING = 'Processing';
    public const FILES_DONE = 'Done';
    public const FILES_ERROR = 'Erreur';
    public const FILES_ARCHIVED = 'Archived';

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param mixed        $data
     * @param array<mixed> $context
     */
    public function serialize($data, string $type, $context = []): string
    {
        return $this->serializer->serialize($data, $type, $context);
    }
}
