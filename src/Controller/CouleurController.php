<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Couleur;
use Doctrine\Persistence\ManagerRegistry;

class CouleurController extends AbstractController
{
    #[Route('/couleur', name: 'app_couleur')]
    public function index(): Response
    {
        return $this->render('couleur/index.html.twig', [
            'controller_name' => 'CouleurController',
        ]);
    }

    public function ajouterCouleur(ManagerRegistry $doctrine){
		
        // récupère le manager d'entités
            $entityManager = $doctrine->getManager();
    
            // instanciation d'un objet Couleur
            $couleur = new Couleur();
            $couleur->setLibelle('Noir');

            // Indique à Doctrine de persister l'objet
            $entityManager->persist($couleur);
    
            // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
            $entityManager->flush();
    
            // renvoie vers la vue de consultation de l'étudiant en passant l'objet couleur en paramètre
           return $this->render('couleur/consulter.html.twig', [
                'couleur' => $couleur,]);
            
        }

        public function listerCouleur(ManagerRegistry $doctrine){

            $repository = $doctrine->getRepository(Couleur::class);
    
    $couleurs= $repository->findAll();
    return $this->render('couleur/lister.html.twig', [
        'pCouleurs' => $couleurs,]);	
        
}

}
