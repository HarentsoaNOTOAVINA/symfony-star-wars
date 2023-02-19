<?php

namespace App\Controller\Admin;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class IndexController extends AbstractController
{
    /**
     * @var ParameterBagInterface
     */
    private $parameterBag;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    /**
     * @Route("/admin", name="admin_index")
     * @return Response
     */
    public function index():Response
    {
        return $this->render('admin/index.html.twig', [
            'immo_base_url' => $this->parameterBag->get('immo_url') . 'admin'
        ]);
    }
}
