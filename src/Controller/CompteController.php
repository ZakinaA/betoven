<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Compte;
use App\Entity\Eleve;
use App\Entity\Responsable;
use App\Entity\Inscription;
use App\Entity\Cours;
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

    public function consulterInformation(ManagerRegistry $doctrine, int $id){

        $compte = $doctrine->getRepository(Compte::class)->find($id);
         //$isResponsable = $doctrine->getRepository(Responsable::class)->findOneBy(['id' => $id]);
 
        if (!$compte) {            
            throw $this->createNotFoundException(
                'Aucun compte trouvé avec le numéro '.$id
            );
        } else {
            $isEleve = $doctrine->getRepository(Eleve::class)->findOneBy(['compte' => $id]);
            $responsableInfo = $doctrine->getRepository(Compte::class)->findOneBy(['id' => $isEleve->getResponsable()]);
            $cours = $doctrine->getRepository(Inscription::class)->findCoursEleve($id);


        }


        if($isEleve == null) {            
            $isEleveType = 0;
        } else {
            $varCompte = $isEleve;
            $isEleveType = 1;
            
        }

        var_dump($cours);
        //var_dump($isResponsable);
        //return new Response('Etudiant : '.$etudiant->getNom());
        return $this->render('compte/consulter.html.twig', [
            'compte' => $varCompte, 'responsableInfo' => $responsableInfo, 'coursInfo' => $cours]);
    }
}
