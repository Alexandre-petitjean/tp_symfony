<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use \Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType {

    public function buildform(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', TextType::class)
                ->add('firstName', TextType::class)
                ->add('mail', EmailType::class)
                ->add('plainPassword', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'first_options' => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repeat Password')
        ));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(
                array('data_class' => User::class
        ));
    }

}
