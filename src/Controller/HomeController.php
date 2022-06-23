<?php

namespace App\Controller;

use Doctrine\DBAL\DriverManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(Request $request): Response
    {
        dump($request);
        $conn = DriverManager::getConnection(['url' => $this->getParameter('conn_params'), 'driver' => 'pdo_pgsql']);
//        to run create query e.g. create schema
        /*try {
            $statement = $conn->prepare('Create schema data;');
            $resultSet = $statement->executeQuery();
        }catch (\Exception $e) {
            var_dump($e->getMessage());
        }*/

//        Select all table in schema data
        try {
            $statement = $conn->prepare("SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname = 'data'");
            $resultSet = $statement->executeQuery();
            $tables = $resultSet->fetchAllAssociative();
        }catch (\Exception $e) {
            var_dump($e->getMessage());
        }

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
