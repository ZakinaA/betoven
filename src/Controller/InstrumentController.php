<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InstrumentController extends AbstractController
{
    #[Route('/instrument', name: 'app_instrument')]
    public function index(): Response
    {
        return $this->render('instrument/index.html.twig', [
            'controller_name' => 'InstrumentController',
        ]);
    }

    public function ajouter(ManagerRegistry $doctrine){
		
        // récupère le manager d'entités
            $entityManager = $doctrine->getManager();
    
            // instanciation d'un objet instrument
            $instrument = new instrument();
            $instrument->setLibelle('Piano');
    
            // Indique à Doctrine de persister l'objet
            $entityManager->persist($instrument);
    
            // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
            $entityManager->flush();
    
            // renvoie vers la vue de consultation de l'éleve en passant l'objet instrument en paramètre
           return $this->render('instrument/consulter.html.twig', [
                'instrument' => $instrument,]);
            
        }

        public function consulterinstrument(ManagerRegistry $doctrine, int $id){

            $instrument= $doctrine->getRepository(Instrument::class)->find($id);
    
            if (!$instrument) {
                throw $this->createNotFoundException(
                'Aucun instrument trouvé avec le numéro '.$id
                );
            }
    
            //return new Response('instrument : '.$instrument->getNom());
            return $this->render('instrument/consulter.html.twig', [
                'instrument' => $instrument,]);
        }

        public function listerInstrument(ManagerRegistry $doctrine){

            $repository = $doctrine->getRepository(instrument::class);
    
    $instrument= $repository->findAll();
    return $this->render('instrument/lister.html.twig', [
        'pinstrument' => $instrument,]);	
        
}

}
