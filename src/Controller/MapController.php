<?php

namespace App\Controller;

use App\Form\MapOptionsType;
use App\Form\MapType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $formMap = $this->createForm(MapType::class);
        $formMap->handleRequest($request);
        if ($formMap->isSubmitted() && $formMap->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $map = $formMap->getData();
            // ... perform some action, such as saving the task to the database

            return new JsonResponse($map);
        }
        return $this->render('map/create.html.twig', [
            'formMap' => $formMap->createView(),
        ]);
    }

    #[Route(path: '/map/{id<\d+>}', name: 'project_map')]
    public function show(Request $request): Response
    {
        dump($request);
        // get the login error if there is one
        $formMap = $this->createForm(MapType::class);

        return $this->render('map/create.html.twig', [
            'formMap' => $formMap->createView(),
        ]);
    }
}
