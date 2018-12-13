<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LoginController extends AbstractController {

    /**
     * @Route("/login", name="login")
     */
    public function index() {
        $formLogin = $this->createFormLogin();
        return $this->render('login/index.html.twig', array('formLogin' => $formLogin->createView()));
    }

    private function createFormLogin() {
        return $this->createFormBuilder()
                        ->add('mailAddress', EmailType::class)
                        ->add('password', PasswordType::class)
                        ->add('submit', SubmitType::class)
                        ->getForm();
    }

}
