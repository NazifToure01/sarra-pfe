<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


use Symfony\Component\Console\Output\ConsoleOutputInterface;


class SecurityController extends AbstractController
{

    #[Route(path: '/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
      {

        if ($this->getUser()){
          dd($this->getUser());
          return $this->redirectToRoute('app_home_page');
        }
         // get the login error if there is one
         $lastUsername = $authenticationUtils->getLastUsername();

         $error = $authenticationUtils->getLastAuthenticationError();

         
          return $this->render('security/login.html.twig', [
             
             'last_username' => $lastUsername,
             'error'         => $error,
          ]);
      }
      
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
   

    }

