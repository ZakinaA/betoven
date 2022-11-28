<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CouterController extends AbstractController
{
    #[Route('/couter', name: 'app_couter')]
    public function index(): Response
    {
        return $this->render('couter/index.html.twig', [
            'controller_name' => 'CouterController',
        ]);
    }
}
