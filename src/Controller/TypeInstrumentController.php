<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeInstrument;
use Doctrine\Persistence\ManagerRegistry;

class TypeInstrumentController extends AbstractController
{
    #[Route('/type/instrument', name: 'app_type_instrument')]
    public function index(): Response
    {
        return $this->render('type_instrument/index.html.twig', [
            'controller_name' => 'TypeInstrumentController',
        ]);
    }



    public function listerTypeInstrument(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(TypeInstrument::class);

$typeintruments= $repository->findAll();
return $this->render('type_instrument/lister.html.twig', [ 
    'pTypeIntruments' => $typeintruments]);	
    
}
}
