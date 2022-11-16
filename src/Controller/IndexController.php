<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class IndexController extends AbstractController
{
    //#[Route('/index', name: 'app_index')]
    public function index()
    {
        return $this->render('index/index.html.twig');
    }

    public function inscriptionPage()
    {
        return $this->render('index/inscription.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
