<?php

namespace App\Controller\Admin;

use App\Services\Star\PeopleServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class PeopleController extends AbstractController
{

    public function __construct(
        private readonly PeopleServices $service
    ) {}

    /**
     * @return Response
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    #[Route( '/personnages', name: 'app_people')]
    public function index(): Response
    {
        $peoples = $this->service->getPeople();

        return $this->render('admin/people/index.html.twig', [
            'peoples' => $peoples['results']
        ]);
    }


}