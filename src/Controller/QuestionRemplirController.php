<?php

namespace App\Controller;

use App\Entity\QuestionRemplir;
use App\Form\QuestionRemplirType;
use App\Repository\QuestionRemplirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/question/remplir')]
class QuestionRemplirController extends AbstractController
{
    #[Route('/', name: 'app_question_remplir_index', methods: ['GET'])]
    public function index(QuestionRemplirRepository $questionRemplirRepository): Response
    {
        return $this->render('question_remplir/index.html.twig', [
            'question_remplirs' => $questionRemplirRepository->findAll(),
        ]);
    }

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

        return $this->renderForm('question_remplir/new.html.twig', [
            'question_remplir' => $questionRemplir,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_question_remplir_show', methods: ['GET'])]
    public function show(QuestionRemplir $questionRemplir): Response
    {
        return $this->render('question_remplir/show.html.twig', [
            'question_remplir' => $questionRemplir,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_question_remplir_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, QuestionRemplir $questionRemplir, QuestionRemplirRepository $questionRemplirRepository): Response
    {
        $form = $this->createForm(QuestionRemplirType::class, $questionRemplir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionRemplirRepository->save($questionRemplir, true);

            return $this->redirectToRoute('app_question_remplir_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('question_remplir/edit.html.twig', [
            'question_remplir' => $questionRemplir,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_question_remplir_delete', methods: ['POST'])]
    public function delete(Request $request, QuestionRemplir $questionRemplir, QuestionRemplirRepository $questionRemplirRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$questionRemplir->getId(), $request->request->get('_token'))) {
            $questionRemplirRepository->remove($questionRemplir, true);
        }

        return $this->redirectToRoute('app_question_remplir_index', [], Response::HTTP_SEE_OTHER);
    }
}
