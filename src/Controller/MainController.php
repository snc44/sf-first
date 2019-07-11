<?php

namespace App\Controller;

use App\Entity\Note;
use App\Form\NoteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $note = new Note();
        $form = $this->createForm(NoteType::class, $note);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $entityManager->persist($note);
            $entityManager->flush();
            return $this->redirectToRoute("index");
        }

        $notes = $entityManager->getRepository(Note::class)->findAll();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'form' => $form->createView(),
            'notes' => $notes
        ]);
    }

    /**
     * @Route("/remove/{note}", name="remove_note")
     */
    public function removeNote(Note $note, Request $request){
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($note);
        $entityManager->flush();
        return $this->redirectToRoute("index");
    }
}
