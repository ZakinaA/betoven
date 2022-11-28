<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoursController extends AbstractController
{
    #[Route('/cours', name: 'app_cours')]
    public function index(): Response
    {
        return $this->render('cours/index.html.twig', [
            'controller_name' => 'CoursController',
        ]);
    }

    public function ajouter(ManagerRegistry $doctrine){
		
        // récupère le manager d'entités
            $entityManager = $doctrine->getManager();
    
            // instanciation d'un objet cours
            $cours = new cours();
            $cours->setNom('Douiou');
            $cours->setPrenom('Sofiane');
            $cours->setDateNaiss(new \DateTime(date('2001-06-24')));
    
            // Indique à Doctrine de persister l'objet
            $entityManager->persist($cours);
    
            // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
            $entityManager->flush();
    
            // renvoie vers la vue de consultation de l'éleve en passant l'objet cours en paramètre
           return $this->render('cours/consulter.html.twig', [
                'cours' => $cours,]);
            
        }

        public function consultercours(ManagerRegistry $doctrine, int $id){

            $cours= $doctrine->getRepository(Cours::class)->find($id);
    
            if (!$cours) {
                throw $this->createNotFoundException(
                'Aucun cours trouvé avec le numéro '.$id
                );
            }
    
            //return new Response('cours : '.$cours->getNom());
            return $this->render('cours/consulter.html.twig', [
                'cours' => $cours,]);
        }

        public function listerCours(ManagerRegistry $doctrine){

            $repository = $doctrine->getRepository(cours::class);
    
    $cours= $repository->findAll();
    return $this->render('cours/lister.html.twig', [
        'pcours' => $cours,]);	
        
}
}
