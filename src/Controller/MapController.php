<?php

namespace App\Controller;

use App\Form\MapType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MapController extends AbstractController
{
    #[Route(path: '/map/new', name: 'new_map')]
    public function new(Request $request): Response
    {
        dump($request);
        // get the login error if there is one
        $form = $this->createForm(MapType::class);
        
        var_dump('test');
        
        return $this->render('map/create.html.twig', [
            'formMap' => $form->createView(),
        ]);
    }
}
