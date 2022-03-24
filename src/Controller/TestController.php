<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Roue;

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
        $boucle = [
            0 => 'Peugeot 208',
            1 => 'Fiat 500',
            2 => 'Tesla Model 3',
            3 => 'Ford',
            4 => 'MG',

        ];
        return $this->render('test/liste.html.twig', [
            'title' => 'Liste de vehicule',
            'nom' =>'toto',
            'prenom'=>'titi',
            'listes'=> $boucle,
        ]);
    }
}
