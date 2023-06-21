<?php

namespace App\Controller\QuestionCorriger;

use App\Entity\QuestionCorriger;
use App\Form\QuestionCorriger1Type;
use App\Repository\QuestionCorrigerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/questions/corriger')]
class QuestionCorrigerController extends AbstractController
{
    #[Route('/', name: 'app_question_corriger_index', methods: ['GET'])]
    public function index(QuestionCorrigerRepository $questionCorrigerRepository): Response
    {
        return $this->render('question_corriger/index.html.twig', [
            'question_corrigers' => $questionCorrigerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_question_corriger_new', methods: ['GET', 'POST'])]
    public function new(Request $request, QuestionCorrigerRepository $questionCorrigerRepository): Response
    {
        $questionCorriger = new QuestionCorriger();
        $form = $this->createForm(QuestionCorriger1Type::class, $questionCorriger);
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

    #[Route('/{id}', name: 'app_question_corriger_show', methods: ['GET'])]
    public function show(QuestionCorriger $questionCorriger): Response
    {
        return $this->render('question_corriger/show.html.twig', [
            'question_corriger' => $questionCorriger,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_question_corriger_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, QuestionCorriger $questionCorriger, QuestionCorrigerRepository $questionCorrigerRepository): Response
    {
        $form = $this->createForm(QuestionCorriger1Type::class, $questionCorriger);
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

    #[Route('/{id}', name: 'app_question_corriger_delete', methods: ['POST'])]
    public function delete(Request $request, QuestionCorriger $questionCorriger, QuestionCorrigerRepository $questionCorrigerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$questionCorriger->getId(), $request->request->get('_token'))) {
            $questionCorrigerRepository->remove($questionCorriger, true);
        }

        return $this->redirectToRoute('app_question_corriger_index', [], Response::HTTP_SEE_OTHER);
    }
}
