<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeInstrument;
use Doctrine\Persistence\ManagerRegistry;

class TypeIntrumentController extends AbstractController
{
    #[Route('/typeintrument', name: 'app_type_intrument')]
    public function index(): Response
    {
        return $this->render('type_intrument/index.html.twig', [
            'controller_name' => 'TypeIntrumentController',
        ]);
    }

    public function ajouterTypeInstrument(ManagerRegistry $doctrine){
		
        // récupère le manager d'entités
            $entityManager = $doctrine->getManager();
    
            // instanciation d'un objet Type instrument
            $typeinstrument = new TypeInstrument();
            $typeinstrument->setLibelle('Batterie');

            // Indique à Doctrine de persister l'objet
            $entityManager->persist($typeinstrument);
    
            // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
            $entityManager->flush();
    
            var_dump($typeinstrument);
            // renvoie vers la vue de consultation de l'étudiant en passant l'objet typeinstrument en paramètre
           return $this->render('type_instrument/consulter.html.twig', [
                'typeinstrument' => $typeinstrument,]);
            
        }

}
