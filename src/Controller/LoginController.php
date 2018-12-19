<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController {

    /**
     * @Route("/login", name="login")
     */
    public function index(AuthenticationUtils $AuthenticationUtils) {
       $error = $AuthenticationUtils->getLastAuthenticationError();
       $lastUsername = $AuthenticationUtils->getLastUsername();
        return $this->render('login/index.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error
        ));
    }

    private function createFormLogin() {
        return $this->createFormBuilder()
                        ->add('mailAddress', EmailType::class)
                        ->add('password', PasswordType::class)
                        ->add('submit', SubmitType::class)
                        ->getForm();
    }

    private function fetchUser(string $mail, string $password) {
        $repository = $this->getDoctrine()->getManager()->getRepository(User::class);
        $result = $repository->findOneBy(
                array(
                    'mail' => $mail,
                    'password' => $password
                )
        );
        return $result;
    }

}
