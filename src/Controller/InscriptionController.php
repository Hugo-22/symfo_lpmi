<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(Request $request): Response
    {

        $form = $this->createForm(InscriptionFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $formData = $form->getData();
            $nom = $formData->getNom();
            $prenom = $formData->getPrenom();

            return $this->render('login/inscriptionDone.html.twig', [
                'nom' => $nom,
                'prenom' => $prenom
            ]);
        }


        return $this->render('login/inscription.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
