<?php

namespace App\Controller\Admin;

use App\Services\Star\PlanetServices;
use App\Services\Star\SpeciesServices;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class SpaciesController
{

    public function __construct(
        private readonly SpeciesServices $service
    ) {}

    /**
     * @return Response
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    #[Route( '/especes', name: 'app_species')]
    public function index(): Response
    {
        $species = $this->service->getPlanet();

        return $this->render('admin/specy/index.html.twig', [
            'species' => $species['results']
        ]);
    }

}