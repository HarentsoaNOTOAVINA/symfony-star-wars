<?php

namespace App\Controller\Admin;

use App\Services\Star\PlanetServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class PlanetController extends AbstractController
{

    public function __construct(
        private readonly PlanetServices $service
    ) {}

    /**
     * @return Response
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    #[Route( '/planettes', name: 'app_planet')]
    public function index(): Response
    {
        $planets = $this->service->getPlanet();

        return $this->render('admin/planet/index.html.twig', [
            'planets' => $planets['results']
        ]);
    }

}