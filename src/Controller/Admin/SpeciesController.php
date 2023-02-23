<?php

namespace App\Controller\Admin;

use App\Services\Star\SpeciesServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class SpeciesController extends AbstractController
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
        $species = $this->service->getSpecies();

        return $this->render('admin/species/index.html.twig', [
            'species' => $species['results']
        ]);
    }

}