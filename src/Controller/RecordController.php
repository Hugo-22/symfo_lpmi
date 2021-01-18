<?php

namespace App\Controller;

use App\Entity\Record;
use App\Form\RecordFormType;
use App\Repository\RecordRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RecordController extends AbstractController
{
    /**
     * @Route("/create/record", name="create_record")
     * @Route("/update/record/{id}", name="update_record", methods="GET|POST")
     */
    public function create(Record $record = null, Request $request, EntityManagerInterface $manager)
    {
        if (!$record)
            $record = new Record();

        $form = $this->createForm(RecordFormType::class, $record);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($record);
            $manager->flush();
            return $this->redirectToRoute('helloPost');
        }

        return $this->render('record/createUpdate.html.twig', [
            "record" => $record,
            "form" => $form->createView()
        ]);
    }


    /**
     * @Route("/deleteRecord/{id}", name="delete_record")
     */
    public function delete(EntityManagerInterface $manager, RecordRepository $repo, Record $record)
    {
        $repo->find($record->getId());
        $manager->remove($record);
        $manager->flush();
        return $this->redirectToRoute('helloPost');
    }
}
