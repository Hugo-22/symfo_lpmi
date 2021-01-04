<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController extends AbstractController
{
    /**
     * @Route("/hello", name="helloPost")
     */
    public function helloPost(Request $request): Response
    {
        $name = null;

        if ($request->isMethod('post')) {
            $formData = $request->request->get('name');

            if (preg_match_all("/^[a-zA-Z]+$/", $formData))
                $name = $formData;
        }

        return $this->render('/hello_world/index.html.twig', [
            'name' => $name
        ]);
    }

    /**
     * @Route("/hello/{name}", name="helloGet", methods={"GET"})
     */
    public function helloGet($name): Response
    {
        $msg = "Hello $name";
        return new Response($msg);
    }


    /**
     * @Route("/liste", name="liste")
     */
    public function liste(): Response
    {
        $liste = ['Bernard', 'Jean', 'Daniel', 'Patrick'];

        return $this->render('/hello_world/liste.html.twig', [
            'liste' => $liste
        ]);
    }
}
