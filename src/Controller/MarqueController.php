<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Marque;
use Doctrine\Persistence\ManagerRegistry;

class MarqueController extends AbstractController
{
    #[Route('/marque', name: 'app_marque')]
    public function index(): Response
    {
        return $this->render('marque/index.html.twig', [
            'controller_name' => 'MarqueController',
        ]);
    }


    public function ajouterMarque(ManagerRegistry $doctrine){
		
        // récupère le manager d'entités
            $entityManager = $doctrine->getManager();
    
            // instanciation d'un objet Marque
            $marque = new Marque();
            $marque->setLibelle('Mapex');

            // Indique à Doctrine de persister l'objet
            $entityManager->persist($marque);
    
            // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
            $entityManager->flush();
    
            // renvoie vers la vue de consultation de l'étudiant en passant l'objet marque en paramètre
           return $this->render('marque/consulter.html.twig', [
                'marque' => $marque,]);
            
        }

}
