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

    public function consulterInformation(ManagerRegistry $doctrine, int $id){

        $eleve = $doctrine->getRepository(Eleve::class)->find($id);

        if (!$eleve) {
            throw $this->createNotFoundException(
                'Aucun compte trouvé avec le numéro '.$id
            );
        }

        var_dump($eleve);
        //return new Response('Etudiant : '.$etudiant->getNom());
        return $this->render('eleve/consulter.html.twig', [
            'eleve' => $eleve,]);
    }
}
