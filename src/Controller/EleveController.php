<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Eleve;
use Doctrine\Persistence\ManagerRegistry;

class EleveController extends AbstractController
{
    #[Route('/eleve', name: 'app_eleve')]
    public function index(): Response
    {
        return $this->render('eleve/index.html.twig', [
            'controller_name' => 'EleveController',
        ]);
    }

    public function ajouter(ManagerRegistry $doctrine){
		
        // récupère le manager d'entités
            $entityManager = $doctrine->getManager();
    
            // instanciation d'un objet Eleve
            $eleve = new Eleve();
            $eleve->setNom('Douiou');
            $eleve->setPrenom('Sofiane');
            $eleve->setDateNaiss(new \DateTime(date('2001-06-24')));
    
            // Indique à Doctrine de persister l'objet
            $entityManager->persist($eleve);
    
            // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
            $entityManager->flush();
    
            // renvoie vers la vue de consultation de l'éleve en passant l'objet eleve en paramètre
           return $this->render('eleve/consulter.html.twig', [
                'eleve' => $eleve,]);
            
        }

        public function consulterEleve(ManagerRegistry $doctrine, int $id){

            $eleve= $doctrine->getRepository(Eleve::class)->find($id);
    
            if (!$eleve) {
                throw $this->createNotFoundException(
                'Aucun eleve trouvé avec le numéro '.$id
                );
            }
    
            //return new Response('Eleve : '.$eleve->getNom());
            return $this->render('eleve/consulter.html.twig', [
                'eleve' => $eleve,]);
        }

        public function listerEleve(ManagerRegistry $doctrine){

            $repository = $doctrine->getRepository(Eleve::class);
    
    $eleves= $repository->findAll();
    return $this->render('eleve/lister.html.twig', [
        'pEleves' => $eleves,]);	
        
}
}
