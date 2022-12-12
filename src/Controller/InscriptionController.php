<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Inscription;
use Doctrine\Persistence\ManagerRegistry;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(): Response
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    public function ajouter(ManagerRegistry $doctrine){

        // récupère le manager d'entités
        $entityManager = $doctrine->getManager();

        // instanciation d'un objet Inscription
        $inscription = new inscription();
        $inscription->setNom('Douiou');
        $inscription->setPrenom('Sofiane');
        $inscription->setDateNaiss(new \DateTime(date('2001-06-24')));

        // Indique à Doctrine de persister l'objet
        $entityManager->persist($inscription);

        // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
        $entityManager->flush();

        // renvoie vers la vue de consultation de l'éleve en passant l'objet inscription en paramètre
        return $this->render('inscription/consulter.html.twig', [
            'inscription' => $inscription,]);

    }

    public function consulterinscription(ManagerRegistry $doctrine, int $id){

        $inscription= $doctrine->getRepository(Inscription::class)->find($id);

        if (!$inscription) {
            throw $this->createNotFoundException(
                'Aucun inscription trouvé avec le numéro '.$id
            );
        }

        //return new Response('Inscription : '.$inscription->getNom());
        return $this->render('inscription/consulter.html.twig', [
            'inscription' => $inscription,]);
    }

    public function listerInscription(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Inscription::class);

        $inscriptions= $repository->findAll();
        return $this->render('inscription/lister.html.twig', [
            'pInscriptions' => $inscriptions,]);

    }
}