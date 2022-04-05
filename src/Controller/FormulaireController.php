<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\MoteurFormType;


/* Formulaire */
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\HttpFoundation\Request;
/* use Symfony\Component\HttpFoundation\Response;*/

/* mettre les entity dans le controller */
use App\Entity\Roue;
use App\Entity\Chassis;
use App\Entity\Moteur;
use App\Entity\Couleur;




class FormulaireController extends AbstractController
{
     /**
     * @Route("/new_roue", name="new_roue")
     */
    public function newRoue(Request $request)
    {
        $roue = new Roue();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $roue);
        
        $formBuilder
            ->add('diametre', TextType::class)
            ->add('save', SubmitType::class)
        ;    

        $form = $formBuilder->getForm();
        // On récupére les données transmises 
        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $roue = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($roue);
            $entityManager->flush();

            $message = "La roue de diamètre" .$roue->getDiametre(). " a bien été créée .";
            
        }else {
            $message ="Entrer le diametre de la roue";
        }

        return $this->render('formulaire/form-roue.html.twig',[
            'form' => $form->createView(),
        ]);
    }  




    /* Condition  */
 
     /**
     * @Route("/new_roue1", name="new_roue1")
     */
    public function newRoue1(Request $request)
    {
        $roue = new Roue();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $roue);
        
        $formBuilder
            ->add('diametre', TextType::class)
            ->add('save', SubmitType::class)
        ;    

        /* isValid == Validation */
        $form = $formBuilder->getForm();
        // On récupére les données transmises 
        if ($request->isMethod('POST')->isValid())
        {
            $form->handleRequest($request);
            $roue = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($roue);
            $entityManager->flush();

            $message = "La roue de diamètre" .$roue->getDiametre(). " a bien été créée .";
            
        }else {
            $message ="Entrer le diametre de la roue";
        }

        return $this->render('formulaire/form-roue.html.twig',[
            'form' => $form->createView(),
        ]);
    }  

     /* Validation */
 
     /**
     * @Route("/new_roue_validation", name="new_roue_validation")
     */
    public function newRoue_validation(Request $request)
    {
        $roue = new Roue();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $roue);
        
        $formBuilder
            ->add('diametre', TextType::class)
            ->add('save', SubmitType::class)
        ;    

        /* isValid == Validation */
        $form = $formBuilder->getForm();
        // On récupére les données transmises 
        if ($request->isMethod('POST')->isValid())
        {
            $form->handleRequest($request);
            $roue = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($roue);
            $entityManager->flush();

            $message = "La roue de diamètre" .$roue->getDiametre(). " a bien été créée .";
            
        }else {
            $message ="Entrer le diametre de la roue";
        }

        return $this->render('formulaire/form-roue.html.twig',[
             'form' => $form->createView(),
             'message'=> $message,
        ]);
    
    }


    /**
     * @Route("/new_moteur", name="new_moteur")
     */
    public function newMoteur(Request $request)
    {
        $moteur = new Moteur();

        $formBuilder = $this->get('form.factory')->createBuilder(MoteurFormType::class, $moteur);       
     
        $form = $formBuilder->getForm();
        // On récupére les données transmises 
        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $roue = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($moteur);
            $entityManager->flush();

            $message = 'Nouveau moteur enregistré';
            
        }else {
            $message = 'Erreur';
        }

        return $this->render('formulaire/form-moteur.html.twig',[
             'form' => $form->createView(),
             'message'=>$message,
             
        ]);
    }    
}
