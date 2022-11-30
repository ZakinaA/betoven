<?php

namespace App\Controller;
// config/packages/security.php
use Symfony\Config\SecurityConfig;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
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