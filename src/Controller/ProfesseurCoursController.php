<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfesseurCoursController extends AbstractController
{
    #[Route('/professeur/cours', name: 'app_professeur_cours')]
    public function index(): Response
    {
        return $this->render('professeur_cours/index.html.twig', [
            'controller_name' => 'ProfesseurCoursController',
        ]);
    }
}
