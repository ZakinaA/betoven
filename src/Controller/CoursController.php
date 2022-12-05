<?php

namespace App\Controller;

use App\Entity\Cours;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;
use App\Entity\Compte;
use App\Entity\Inscription;
use App\Entity\ProfesseurCours;
use Doctrine\Persistence\ManagerRegistry;
class CoursController extends AbstractController
{
    #[Route('/cours', name: 'app_cours')]
    public function index(): Response
    {
        return $this->render('cours/index.html.twig', [
            'controller_name' => 'CoursController',
        ]);
    }

    public function consulterCours(ManagerRegistry $doctrine, int $id){
        $participants = $doctrine->getRepository(Inscription::class)->findByCour($id);
        $cours = $doctrine->getRepository(Cours::class)->find($id);

        if (!$cours) {
            throw $this->createNotFoundException(
                'Aucun cours trouvé avec le numéro '.$id
            );
        }
        //var_dump($cours);
        //return new Response('cours : '.$cours->getNom());
        return $this->render('cours/consulter.html.twig', 
        [
            'cours' => $cours,
            'participants' => $participants,
        ]);
    }


    public function listerCours(ManagerRegistry $doctrine){

        $listeCours = $doctrine->getRepository(Cours::class)->findAll();
        return $this->render('cours/lister.html.twig', [
            'pCours' => $listeCours,]);
    }
}
