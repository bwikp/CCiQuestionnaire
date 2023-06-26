<?php

namespace App\Controller\QuestionCorriger;

use App\Entity\QuestionCorriger;
use App\Form\QuestionCorrigerType;
use App\Repository\QuestionCorrigerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/questions/corriger')]
class QuestionCorrigerEditController extends AbstractController
{
#[Route('/{id}/edit', name: 'app_question_corriger_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, QuestionCorriger $questionCorriger, QuestionCorrigerRepository $questionCorrigerRepository): Response
    {
        $form = $this->createForm(QuestionCorrigerType::class, $questionCorriger);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionCorrigerRepository->save($questionCorriger, true);

            return $this->redirectToRoute('app_question_corriger_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('question_corriger/edit.html.twig', [
            'question_corriger' => $questionCorriger,
            'form' => $form,
        ]);
    }
}