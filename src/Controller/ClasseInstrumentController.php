<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ClasseInstrument;
use Doctrine\Persistence\ManagerRegistry;

class ClasseInstrumentController extends AbstractController
{
    #[Route('/classeinstrument', name: 'app_classe_instrument')]
    public function index(): Response
    {
        return $this->render('classe_instrument/index.html.twig', [
            'controller_name' => 'ClasseInstrumentController',
        ]);
    }


    public function ajouterClasseInstrument(ManagerRegistry $doctrine){
		
        // récupère le manager d'entités
            $entityManager = $doctrine->getManager();
    
            // instanciation d'un objet ClasseInstrument
            $classeinstrument = new ClasseInstrument();
            $classeinstrument->setLibelle('Percussions');

            // Indique à Doctrine de persister l'objet
            $entityManager->persist($classeinstrument);
    
            // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
            $entityManager->flush();
    
            // renvoie vers la vue de consultation de l'étudiant en passant l'objet classeinstrument en paramètre
           return $this->render('classe_instrument/consulter.html.twig', [
                'classeinstrument' => $classeinstrument,]);
            
        }

}
