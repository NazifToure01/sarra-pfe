<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OmraController extends AbstractController
{
    /**
     * @Route("profile/omra/new", name="omra_create")
     * 
     */
    public function create(){

        return $this->render('omra/create.html.twig');
    }



    #[Route('/omra', name: 'app_omra')]
    public function index(): Response
    {
        return $this->render('omra/index.html.twig', [
            'controller_name' => 'OmraController',
        ]);
    }
    
}
