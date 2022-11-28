<?php

namespace App\Controller;
// config/packages/security.php
use Symfony\Config\SecurityConfig;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(): Response
    {
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }
}


return static function (SecurityConfig $security) {
    // ...

    $mainFirewall = $security->firewall('main');

    // "app_login" is the name of the route created previously
    $mainFirewall->formLogin()
        ->loginPath('app_login')
        ->checkPath('app_login')
    ;
};