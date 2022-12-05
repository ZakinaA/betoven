<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeCoursController extends AbstractController
{
    #[Route('/type/cours', name: 'app_type_cours')]
    public function index(): Response
    {
        return $this->render('type_cours/index.html.twig', [
            'controller_name' => 'TypeCoursController',
        ]);
    }
}
