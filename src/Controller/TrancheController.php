<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrancheController extends AbstractController
{
    #[Route('/tranche', name: 'app_tranche')]
    public function index(): Response
    {
        return $this->render('tranche/index.html.twig', [
            'controller_name' => 'TrancheController',
        ]);
    }
}
