<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\Contact;
use App\Form\FormContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }


    #[Route('/contact', name: 'app_contact')]
    public function index( Request $request): Response
    {

        $contact = new Contact();

        $form = $this->createForm(FormContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $contact = $form->getData();

            $this->entityManager->persist($contact);

            $this->entityManager->flush();

            $mail = new Mail();
            $content = "TRANSATOUR vous remercie pour votre message. Nous vous reviendrons très rapidement ";
            $to = "Mr/ Mm ";
            $mail->send($contact->getEmail(), $to , "Message envoyé", $content);

            $mail2 = new Mail();
            $content_admin = "Un client vous a envoyé un mail <br> Email du client :".$contact->getEmail()."<br> Objet du client :".$contact->getObject(). "<br> Message du client :".$contact->getObject() ;
            $to_admin = "Mr Robot ";
            $mail_admin = 'moussasara206@gmail.com';
            $mail->send($mail_admin, $to_admin , "Un client veut vous contacter ", $content_admin);


        }


        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
