<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    public function indexAdmin(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    public function listerUtilisateurs(): Response
    {
        return $this->render('admin/listerUtilisateurs.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}

