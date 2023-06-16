<?php

namespace App\Controller;

use App\Entity\QuestionCompleter;
use App\Form\QuestionCompleterType;
use App\Repository\QuestionCompleterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/question/completer')]
class QuestionCompleterController extends AbstractController
{
    #[Route('/', name: 'app_question_completer_index', methods: ['GET'])]
    public function index(QuestionCompleterRepository $questionCompleterRepository): Response
    {
        return $this->render('question_completer/index.html.twig', [
            'question_completers' => $questionCompleterRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_question_completer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, QuestionCompleterRepository $questionCompleterRepository): Response
    {
        $questionCompleter = new QuestionCompleter();
        $form = $this->createForm(QuestionCompleterType::class, $questionCompleter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionCompleterRepository->save($questionCompleter, true);

            return $this->redirectToRoute('app_question_completer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('question_completer/new.html.twig', [
            'question_completer' => $questionCompleter,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_question_completer_show', methods: ['GET'])]
    public function show(QuestionCompleter $questionCompleter): Response
    {
        return $this->render('question_completer/show.html.twig', [
            'question_completer' => $questionCompleter,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_question_completer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, QuestionCompleter $questionCompleter, QuestionCompleterRepository $questionCompleterRepository): Response
    {
        $form = $this->createForm(QuestionCompleterType::class, $questionCompleter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionCompleterRepository->save($questionCompleter, true);

            return $this->redirectToRoute('app_question_completer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('question_completer/edit.html.twig', [
            'question_completer' => $questionCompleter,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_question_completer_delete', methods: ['POST'])]
    public function delete(Request $request, QuestionCompleter $questionCompleter, QuestionCompleterRepository $questionCompleterRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$questionCompleter->getId(), $request->request->get('_token'))) {
            $questionCompleterRepository->remove($questionCompleter, true);
        }

        return $this->redirectToRoute('app_question_completer_index', [], Response::HTTP_SEE_OTHER);
    }
}
