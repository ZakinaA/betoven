<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Accessoire;
use Doctrine\Persistence\ManagerRegistry;


class AccessoireController extends AbstractController
{
    #[Route('/accessoire', name: 'app_accessoire')]
    public function index(): Response
    {
        return $this->render('accessoire/index.html.twig', [
            'controller_name' => 'AccessoireController',
        ]);
    }

    public function ajouterAccessoire(ManagerRegistry $doctrine){
		
        // récupère le manager d'entités
            $entityManager = $doctrine->getManager();
    
            // instanciation d'un objet Accessoire
            $accessoire = new Accessoire();
            $accessoire->setLibelle('Ampli 10W');

            // Indique à Doctrine de persister l'objet
            $entityManager->persist($accessoire);
    
            // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
            $entityManager->flush();
    
            // renvoie vers la vue de consultation de l'étudiant en passant l'objet accessoire en paramètre
           return $this->render('accessoire/consulter.html.twig', [
                'accessoire' => $accessoire,]);
            
        }

        public function listerAccessoire(ManagerRegistry $doctrine){

            $repository = $doctrine->getRepository(Accessoire::class);
    
    $accessoires= $repository->findAll();
    return $this->render('accessoire/lister.html.twig', [
        'pAccessoires' => $accessoires,]);	
        
}

}
