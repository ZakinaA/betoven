<?php

namespace App\Controller;


use App\Form\InscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Compte;
use App\Entity\Inscription;
use App\Entity\Paiement;
use App\Entity\PretInstrument;
use App\Entity\Eleve;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
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

        if (!$compte) {
            throw $this->createNotFoundException(
                'Aucun compte trouvé avec le numéro '.$id
            );
        } else {
            $eleveInscription = $doctrine->getRepository(Eleve::class)->getCoursEleve($id);
            $findPretsInstrumentsEleve = $doctrine->getRepository(Eleve::class)->findPretInsturment($id);

        }


        //var_dump($compte);
        //return new Response('Etudiant : '.$etudiant->getNom());
        return $this->render('compte/consulter.html.twig', [
            'compte' => $compte, 'inscription' => $eleveInscription, 'pretsInstruments' => $findPretsInstrumentsEleve]);
    }


    public function modifierInformationCompte(ManagerRegistry $doctrine)
    {
        return $this->render('compte/modifier.html.twig', []);
    }

    public function verificationEtatCompte(ManagerRegistry $doctrine, Request $request) {
        $requestData = $request->request->all();
        $adresseMail = $requestData['adressemail'];
        $verificationInscription = $doctrine->getRepository(Compte::class)->findOneBy(['mail' => $adresseMail]);

        if($verificationInscription == null) {
            $verificationInscriptionState = -1;
        } else {
            $verificationInscriptionState = $verificationInscription->getActif();
        }
        return new JsonResponse(['result' => 'ok', 'actif' => (int) $verificationInscriptionState]);
    }
}
