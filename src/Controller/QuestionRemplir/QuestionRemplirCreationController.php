<?php

namespace App\Controller\QuestionRemplir;

use App\Entity\QuestionRemplir;
use App\Form\QuestionRemplirType;
use App\Repository\QuestionRemplirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/question/remplir')]
class QuestionRemplirCreationController extends AbstractController
{
   

    #[Route('/new', name: 'app_question_remplir_new', methods: ['GET', 'POST'])]
    public function new(Request $request, QuestionRemplirRepository $questionRemplirRepository): Response
    {
        $questionRemplir = new QuestionRemplir();
        $form = $this->createForm(QuestionRemplirType::class, $questionRemplir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionRemplirRepository->save($questionRemplir, true);

            return $this->redirectToRoute('app_question_remplir_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('question_remplir/new.html.twig', [
            'question_remplir' => $questionRemplir,
            'form' => $form,
        ]);
    }

    
}
