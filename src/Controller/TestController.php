<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="app_test")
     */
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'title' => 'Miaw_Projet',
            'date' => date("D M Y h:i:s A"),
        ]);
    }


     /**
     * @Route("/liste", name="app_test")
     */
    public function liste(): Response
    {
        return $this->render('test/liste.html.twig', [
            'title' => 'Liste',
            'nom' =>'toto',
            'prenom'=>'titi',
            'liste'=>['1','2','3','4','5'],
        ]);
    }
}
