<?php

namespace App\Controller;

use App\Entity\Upload;
use App\Form\UploadType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class DepotController extends AbstractController
{
    #[Route('/depot', name: 'app_depot')]
    public function index(Request $request, ManagerRegistry $managerRegistry): Response
    {
        $upload = new Upload();
       // $upload->setUser();
        $form = $this->createForm(UploadType::class);
        $form->handleRequest($request);
        $manager = $managerRegistry->getManager();

        if ($form->isSubmitted() && $form->isValid()){
            $uploadedFile = $form->getData();
            var_dump($uploadedFile);
            $manager->persist($uploadedFile);
            $manager->flush();
            //dd($uploadedFile);
        }
        return $this->render('depot/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
