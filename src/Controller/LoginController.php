<?php

namespace App\Controller;

use App\Form\LoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(LoginFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            $username = $formData['username'];

            return $this->render('login/loginDone.html.twig', ['username' => $username]);
        }

        return $this->render('login/login.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
