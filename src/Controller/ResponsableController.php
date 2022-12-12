<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResponsableController extends AbstractController
{
    #[Route('/responsable', name: 'app_responsable')]
    public function index(): Response
    {
        return $this->render('responsable/index.html.twig', [
            'controller_name' => 'ResponsableController',
        ]);
    }

    public function ajouter(ManagerRegistry $doctrine){

        // récupère le manager d'entités
        $entityManager = $doctrine->getManager();

        // instanciation d'un objet responsable
        $responsable = new responsable();
        $responsable->setNom('');
        $responsable->setPrenom('');
        $responsable->setDateNaiss(new \DateTime(date('')));
        $responsable->setAdresse('');
        $responsable->setVille('');
        $responsable->setCodePostale('');
        $responsable->setEmail('');
        $responsable->setTel1('');
        $responsable->setTel2('');
        $responsable->setTel3('');
        $responsable->setQuotientFamillial('');

        // Indique à Doctrine de persister l'objet
        $entityManager->persist($responsable);

        // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
        $entityManager->flush();

        // renvoie vers la vue de consultation de l'éleve en passant l'objet responsable en paramètre
        return $this->render('responsable/consulter.html.twig', [
            'responsable' => $responsable,]);

    }

    public function consulterResponsable(ManagerRegistry $doctrine, int $id){

        $responsable= $doctrine->getRepository(responsable::class)->find($id);

        if (!$responsable) {
            throw $this->createNotFoundException(
                'Aucun responsable trouvé avec le numéro '.$id
            );
        }

        //return new Response('responsable : '.$responsable->getNom());
        return $this->render('responsable/consulter.html.twig', [
            'responsable' => $responsable,]);
    }

    public function listerResponsable(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(responsable::class);

        $responsables= $repository->findAll();
        return $this->render('responsable/lister.html.twig', [
            'pResponsables' => $responsables,]);

    }
}