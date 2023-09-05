<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    private $hasher;
    public function __construct(UserPasswordHasherInterface $hasher){
        $this->hasher = $hasher;

    }
    /**
     * @route("/inscription",name="inscription")
     */
    public function registration(Request $request, ManagerRegistry $managerRegistry) {
        $user = new User();
        $manager = $managerRegistry->getManager();
        $form=$this->createform(RegistrationType:: class,$user);
        $form->handleRequest($request);
        $notification = null;

        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $email_search = $managerRegistry->getRepository(User::class)->findByEmail($user->getEmail());
            if (!$email_search){
                $password = $this->hasher->hashPassword($user, $user->getPassword());
                $user->setPassword($password);
                $user->setRoles(array('ROLE_USER'));

                $manager->persist($user);
                $manager->flush();
                $notification = "Votre inscription s'est bien déroulés";

                $mail = new Mail();
                $content = "Bonjour ".$user->getName()."<br>"." Bienvenue sur TRANSATOUR "."<br>"." Lorem ipsum dolor sit amet. A omnis inventore aut repellendus rerum ea consequatur debitis. Ut rerum facere ex Quis ratione nam odio fugit aut rerum molestiae nam repudiandae consequatur et omnis obcaecati sit reprehenderit Quis. Et inventore voluptatem eos voluptate voluptatum id repellendus velit in suscipit quia quo alias consectetur ut voluptate neque aut iusto libero. ";
                $mail->send($user->getEmail(), $user->getName(), "Confirmation de l'incription", $content);
            }
            else{
                $notification = "L'Email utilisé existe déja";
            }
        }


        return $this->render('security/registration.html.twig',[
            'form'=>$form->createView(),
            'notification'=>$notification
        ]);


    }

}
