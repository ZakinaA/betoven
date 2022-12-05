<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Professeur;

class AdministrateurController extends AbstractController
{
    #[Route('/administrateur', name: 'app_administrateur')]
    public function index(): Response
    {
        return $this->render('administrateur/index.html.twig', [
            'controller_name' => 'AdministrateurController',
        ]);
    }

    public function ajouterProfesseur(ManagerRegistry $doctrine){
		
        // récupère le manager d'entités
            $entityManager = $doctrine->getManager();
    
            // instanciation d'un objet Professeur
            $professeur = new Professeur();
            $professeur->setCompteId('17');
    
            // Indique à Doctrine de persister l'objet
            $entityManager->persist($professeur);
    
            // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
            $entityManager->flush();
    
            // renvoie vers la vue de consultation de l'éleve en passant l'objet professeur en paramètre
           return $this->render('professeur/consulter.html.twig', [
                'profsseur' => $professeur,]);
            
        }

        public function consulterProfesseur(ManagerRegistry $doctrine, int $id){

            $professeur= $doctrine->getRepository(Professeur::class)->find($id);
    
            if (!$professeur) {
                throw $this->createNotFoundException(
                'Aucun professeur trouvé avec le numéro '.$id
                );
            }
    
            //return new Response('Professeur : '.$professeur->getCompteId());
            return $this->render('professeur/consulter.html.twig', [
                'professeur' => $professeur,]);
        }

        public function listerProfesseur(ManagerRegistry $doctrine){

            $repository = $doctrine->getRepository(Professeur::class);
    
            $professeurs= $repository->findAll();
            return $this->render('professeur/lister.html.twig', [
                'pProfesseurs' => $professeurs,]);	
    }

}
