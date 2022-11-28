<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Instrument;
use Doctrine\Persistence\ManagerRegistry;

class InstrumentController extends AbstractController
{
    #[Route('/instrument', name: 'app_instrument')]
    public function index(): Response
    {
        return $this->render('instrument/index.html.twig', [
            'controller_name' => 'InstrumentController',
        ]);
    }

    public function ajouterInstrument(ManagerRegistry $doctrine){

        // récupère le manager d'entités
        $entityManager = $doctrine->getManager();

        // instanciation d'un objet Instrument
        $instrument = new Instrument();
        $instrument->setNumSerie('28M4GF');
        $instrument->setDateAchat(new \DateTime(date('1999-07-14')));
        $instrument->setPrixAchat(25);

        // Indique à Doctrine de persister l'objet
        $entityManager->persist($instrument);

        // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
        $entityManager->flush();

        // renvoie vers la vue de consultation de l'étudiant en passant l'objet instrument en paramètre
        return $this->render('instrument/consulter.html.twig', [
            'instrument' => $instrument,]);

    }

    public function consulterInstrument(ManagerRegistry $doctrine, int $id){

        $instrument= $doctrine->getRepository(Instrument::class)->find($id);

        if (!$instrument) {
            throw $this->createNotFoundException(
                'Aucun instrument trouvé avec le numéro '.$id
            );
        }
        //return new Response('Instrument : '.$instrument->getNom());
        return $this->render('instrument/consulter.html.twig', [
            'instrument' => $instrument,]);
    }

    public function listerInstrument(ManagerRegistry $doctrine){
        $instruments = $doctrine->getRepository(Instrument::class)->findAll();
        return $this->render('instrument/lister.html.twig', [
            'pInstruments' => $instruments]);

    }
}
