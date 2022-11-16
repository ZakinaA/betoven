<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Compte;
use Doctrine\Persistence\ManagerRegistry;

class CompteController extends AbstractController
{
    #[Route('/compte', name: 'app_compte')]
    public function index(): Response
    {
        return $this->render('compte/index.html.twig', [
            'controller_name' => 'CompteController',
        ]);
    }

    /*public function consulterInformation(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Compte::class);

        $etudiants= $repository->findAll();
        return $this->render('etudiant/lister.html.twig', [
            'pEtudiants' => $etudiants,]);

    }*/

    public function consulterInformation(ManagerRegistry $doctrine, int $id){

        $compte= $doctrine->getRepository(Compte::class)->find($id);

        if (!$compte) {
            throw $this->createNotFoundException(
                'Aucun compte trouvé avec le numéro '.$id
            );
        }

        //return new Response('Etudiant : '.$etudiant->getNom());
        return $this->render('compte/consulter.html.twig', [
            'compte' => $compte,]);
    }
}
