<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/* Formulaire */
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
 
/* mettre les entity dans le controller */
use App\Entity\Roue;
use App\Entity\Chassis;
use App\Entity\Moteur;
use App\Entity\Couleur;

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

    /* Action = Route */
    /**
     * @Route("/add_roue/{diametre}", name="add_roue")
     */

    public function addRoue($diametre): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $maRoue = new Roue();
        $maRoue->setDiametre($diametre);

        $entityManager->persist($maRoue);

        $entityManager->flush();
        /* les donnnes sont envoyé au BDD */
        
        /*return new Response ('Nouvelle roue créée :'.$maRoue->getId());*/
        return $this->render('test/addRoue.html.twig', [
            'title' => 'List Roue',
            'idRoue'=> $maRoue->getId(),
            'diametre'=> $maRoue->getDiametre(),
        ]);
    }

     /* Chassis et moteur */

    /**
     * @Route("/chassis/{largeur}/{longueur}", name="addChassis")
     */
    public function addChassis($largeur,$longueur): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $maChassis = new Chassis();
        $maChassis->setlargeur($largeur);
        $maChassis->setlongueur($longueur);
   
        $entityManager->persist($maChassis);
    
        $entityManager->flush();
        /* les donnnes sont envoyé au BDD */
        
        /*return new Response ('Nouvelle roue créée :'.$maRoue->getId());*/
        return $this->render('test/part-create.html.twig', [
            'title' => 'Création d\' un chassis',
            'type'=> 'chassis',
            'part'=> $maChassis,
        ]);
    }

    /**
     * @Route("/moteur/{energie}/{puissance}", name="addMoteur")
     */
    public function addMoteur($energie, $puissance): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $maMoteur = new Moteur();
        $maMoteur->setenergie($energie);
        $maMoteur->setpuissance($puissance);
   
        $entityManager->persist($maMoteur);
    
        $entityManager->flush();
        /* les donnnes sont envoyé au BDD */
        
        /*return new Response ('Nouvelle roue créée :'.$maRoue->getId());*/
        return $this->render('test/part-create.html.twig', [
            'title' => 'Création d\' un moteur',
            'type'=> 'moteur',
            'part'=> $maMoteur,
        ]);
    }

     /**
     * @Route("/couleur_vehicule/{nom}", name="addCouleur")
     */
    public function addCouleur($nom): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $maCouleur = new Couleur();
        $maCouleur->setNom($nom);
        
        $entityManager->persist($maCouleur);
    
        $entityManager->flush();
        /* les donnnes sont envoyé au BDD */
        
        /*return new Response ('Nouvelle roue créée :'.$maRoue->getId());*/
        return $this->render('test/couleur-vehicule.html.twig', [
            'title' => 'Création d\' un Couleur',
            'nom_couleur'=> $maCouleur,
        ]);
    }
    
    
     
    
     
     


}
    


