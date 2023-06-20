<?php

namespace App\Controller\QuestionQcm;

use App\Entity\QuestionQcm;
use App\Form\QuestionQcm1Type;
use App\Repository\QuestionQcmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/questions/qcm')]
class QuestionQcmController extends AbstractController
{
    #[Route('/', name: 'app_question_qcm_index', methods: ['GET'])]
    public function index(QuestionQcmRepository $questionQcmRepository): Response
    {
        return $this->render('question_qcm/index.html.twig', [
            'question_qcms' => $questionQcmRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_question_qcm_new', methods: ['GET', 'POST'])]
    public function new(Request $request, QuestionQcmRepository $questionQcmRepository): Response
    {
        $questionQcm = new QuestionQcm();
        $form = $this->createForm(QuestionQcm1Type::class, $questionQcm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionQcmRepository->save($questionQcm, true);

            return $this->redirectToRoute('app_question_qcm_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('question_qcm/new.html.twig', [
            'question_qcm' => $questionQcm,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_question_qcm_show', methods: ['GET'])]
    public function show(QuestionQcm $questionQcm): Response
    {
        return $this->render('question_qcm/show.html.twig', [
            'question_qcm' => $questionQcm,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_question_qcm_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, QuestionQcm $questionQcm, QuestionQcmRepository $questionQcmRepository): Response
    {
        $form = $this->createForm(QuestionQcm1Type::class, $questionQcm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionQcmRepository->save($questionQcm, true);

            return $this->redirectToRoute('app_question_qcm_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('question_qcm/edit.html.twig', [
            'question_qcm' => $questionQcm,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_question_qcm_delete', methods: ['POST'])]
    public function delete(Request $request, QuestionQcm $questionQcm, QuestionQcmRepository $questionQcmRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$questionQcm->getId(), $request->request->get('_token'))) {
            $questionQcmRepository->remove($questionQcm, true);
        }

        return $this->redirectToRoute('app_question_qcm_index', [], Response::HTTP_SEE_OTHER);
    }
}
