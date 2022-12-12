<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Form\CoursType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;
use App\Entity\Compte;
use App\Entity\Paiement;
use App\Entity\Eleve;
use App\Entity\Inscription;
use App\Entity\ProfesseurCours;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

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
        $user = $this->getUser();
        if($user != null) {
            $eleve = $doctrine->getRepository(Eleve::class)->findOneBy(['compte' => $user->getId()]);
            $verificationInscription = $doctrine->getRepository(Inscription::class)->findOneBy(['eleve' => $eleve->getId(), 'cour' => $cours->getId()]);
        }
        //
        $verificationInscription  = "";
        //var_dump($user);
        if (!$cours) {
            throw $this->createNotFoundException(
                'Aucun cours trouvé avec le numéro '.$id
            );
        }
        //var_dump($cours);
        //return new Response('cours : '.$cours->getNom());
        if($user != null) {
            return $this->render('cours/consulter.html.twig',
                [
                    'cours' => $cours,
                    'participants' => $participants,
                    'verificationInscription' => $verificationInscription
                ]);
        } else {
            return $this->render('cours/consulter.html.twig',
                [
                    'cours' => $cours,
                    'participants' => $participants

                ]);
        }
    }


    public function listerCours(ManagerRegistry $doctrine){

        $listeCours = $doctrine->getRepository(Cours::class)->findAll();
        return $this->render('cours/lister.html.twig', [
            'pCours' => $listeCours,]);
    }

    public function monPlanning(ManagerRegistry $doctrine, int $id){
        $mesCours = $doctrine->getRepository(Cours::class)->getMonPlanning($id);
        return $this->render('cours/planning.html.twig', [
            'pCours' => $mesCours,
        ]);
    }
    public function inscriptionCours(ManagerRegistry $doctrine, int $id){

       // $listeCours = $doctrine->getRepository(Cours::class)->findAll();
        return $this->render('cours/inscription.html.twig', [
            'idCours' => $id
        ]);
    }

    public function inscriptionCoursFunc(ManagerRegistry $doctrine, Request $request)
    {
        $requestData = $request->request->all();
        $coursid = $requestData['coursid'];
        $eleveid = (int) $requestData['eleveID'];
        $entityManager = $doctrine->getManager();

        $eleve = $doctrine->getRepository(Eleve::class)->findOneBy(['compte' => $eleveid]);
        $cours = $doctrine->getRepository(Cours::class)->find($coursid);

        $inscription = new Inscription();
        $inscription->setDateInscription(new \DateTime('now'));
        $inscription->setEleve($eleve);
        $inscription->setCour($cours);
        $entityManager->persist($inscription);
        $entityManager->flush();
        return new JsonResponse(['result' => 'ok']);

    }

    public function ajouterInscription(ManagerRegistry $doctrine, Request $request) {
        $requestData = $request->request->all();
        $coursid  = $requestData['coursid'];
        $eleveid  = (int) $requestData['eleveID'];
        $datePaiement = $requestData['datepaiement'];
        $entityManager = $doctrine->getManager();


        $paiementInscription = new Paiement();
        $paiementInscription->setDatePaiement(new \DateTime($datePaiement));
        $paiementInscription->setMontant(10.0);

        $inscription = $doctrine->getRepository(Inscription::class)->findOneBy(['eleve' => $eleveid, 'cour' => $coursid]);
        //$inscription = $doctrine->getRepository(Inscription::class)->find($inscriptionID);


        $paiementInscription->setInscription($inscription);

        $entityManager->persist($paiementInscription);
        $entityManager->flush();

        return new JsonResponse(['result' => 'ok', 'coursid' => (int) $coursid, 'eleveid' =>(int) $eleveid, 'datepaiement' => $datePaiement]);
    }

    public function ajouter(ManagerRegistry $doctrine,Request $request){
        
        $cours = new Cours();
	    $form = $this->createForm(CoursType::class, $cours);
	    $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
    
            $cours = $form->getData();
    
            $entityManager = $doctrine->getManager();
            $entityManager->persist($cours);
            $entityManager->flush();
            
            return $this->forward('App\Controller\CoursController::consulterCours', 
            [
                'id'  => $cours->getId(),
            ]);
        }
        else
        {
            return $this->render('cours/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }
}
