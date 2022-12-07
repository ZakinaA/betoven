<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Compte;

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
}

