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
class QuestionCorrigerNewController extends AbstractController
{

#[Route('/new', name: 'app_question_corriger_new', methods: ['GET', 'POST'])]
    public function new(Request $request, QuestionCorrigerRepository $questionCorrigerRepository): Response
    {
        $questionCorriger = new QuestionCorriger();
        $form = $this->createForm(QuestionCorrigerType::class, $questionCorriger);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionCorrigerRepository->save($questionCorriger, true);

            return $this->redirectToRoute('app_question_corriger_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('question_corriger/new.html.twig', [
            'question_corriger' => $questionCorriger,
            'form' => $form,
        ]);
    }
}