<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'HomeController',
            'id_modal_map_new' => 'newMapForm',
        ]);
    }

    #[Route('/admin', name: 'app_admin')]
    public function admin(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
