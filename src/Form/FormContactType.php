<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'label'=>'Email',
                'attr'=>[
                    'placeholder'=>'Email',
                ]
            ])
            ->add('object', TextType::class,[
                'label'=>'Objet',
                'attr'=>[
                    'placeholder'=>'Objet du message',
                ]
            ])
            ->add('content',TextareaType::class,[
                'label'=>'Votre message',
                'attr'=>[
                    'placeholder'=>'Votre message',
                ]
            ])

            ->add('submit', SubmitType::class,[
                'label'=>'Envoyez le message'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
