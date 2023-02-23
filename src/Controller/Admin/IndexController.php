<?php

namespace App\Controller\Admin;

use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class IndexController extends AbstractController
{

    public function __construct(
       private ParameterBagInterface $parameterBag)
    {}

    #[Route('/', name: 'app_index')]
    public function index(Request $request):Response
    {

        return $this->render('admin/index.html.twig', [
            'immo_base_url' => $this->parameterBag->get('immo_url') . 'admin'
        ]);
    }

}
