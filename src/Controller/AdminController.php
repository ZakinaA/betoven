<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Compte;
use App\Form\EditUtilisateurAdminType;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends AbstractController
{
    public function indexAdmin(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    public function listerUtilisateurs(ManagerRegistry $doctrine)
    {


        $listerUtilisateurs = $doctrine->getRepository(Compte::class)->findAll();
        //var_dump($listerUtilisateurs);
        return $this->render('admin/listerUtilisateurs.html.twig', [
            'pListerUtilisateurs' => $listerUtilisateurs
        ]);
    }


    public function cartUpdateAction(ManagerRegistry $doctrine, Request $request) {
        $requestData = $request->request->all();
        $accountid  = $requestData['accountid'];
        $actifid  = $requestData['actifID'];
        $entityManager = $doctrine->getManager();

        $compte = $entityManager->getRepository(Compte::class)->find($accountid);
        if($actifid == 1) {
            $compte->setActif(0);
        } else {
            $compte->setActif(1);
        }
        $entityManager->persist($compte);
        $entityManager->flush();

        return new JsonResponse(['result' => 'ok', 'actiftype' => $compte->getActif()]);
    }

    public function updateAccountUser(ManagerRegistry $doctrine,$id, Request $request) {
        //récupération de l'étudiant dont l'id est passé en paramètre
        $entityManager = $doctrine->getManager();
        $compte = $entityManager->getRepository(Compte::class)->find($id);

        if (!$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException('No access for you!');
        }

        if (!$compte) {
            throw $this->createNotFoundException('Aucun compte trouvé avec le numéro '.$id);
        }
        else
        {
            $form = $this->createForm(EditUtilisateurAdminType::class, $compte);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $etudiant = $form->getData();
                $entityManager->persist($etudiant);
                $entityManager->flush();

                $listerUtilisateurs = $doctrine->getRepository(Compte::class)->findAll();
                //var_dump($listerUtilisateurs);
                return $this->render('admin/listerUtilisateurs.html.twig', [
                    'pListerUtilisateurs' => $listerUtilisateurs
                ]);
            }
            else{
                //var_dump($form);
                return $this->render('admin/modifier-utilisateur.html.twig', array('form' => $form->createView(),'compteinfo' => $compte));
            }
        }
    }
}

