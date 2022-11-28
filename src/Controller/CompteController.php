<?php

namespace App\Controller;


use App\Form\InscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Compte;
use App\Entity\Inscription;
use App\Entity\Paiement;
use App\Entity\PretInstrument;
use App\Entity\Eleve;
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

    public function inscriptionPage()
    {
        $inscription = new compte();
        $form = $this->createForm(InscriptionType::class, $inscription);
        return $this->render('index/inscription.html.twig', array(
            'form' => $form->createView(), ));
    }

}
