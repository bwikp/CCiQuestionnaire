<?php

namespace App\Controller\ThemFormaQuestions;

use App\Entity\ThemFormaQuestions;
use App\Form\ThemFormaQuestions3Type;
use App\Repository\ThemFormaQuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/them/forma/questions')]
class ThemFormaQuestionsController extends AbstractController
{
    #[Route('/', name: 'app_them_forma_questions_index', methods: ['GET'])]
    public function index(ThemFormaQuestionsRepository $themFormaQuestionsRepository): Response
    {
        return $this->render('them_forma_questions/index.html.twig', [
            'them_forma_questions' => $themFormaQuestionsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_them_forma_questions_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ThemFormaQuestionsRepository $themFormaQuestionsRepository): Response
    {
        $themFormaQuestion = new ThemFormaQuestions();
        $form = $this->createForm(ThemFormaQuestions3Type::class, $themFormaQuestion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $themFormaQuestionsRepository->save($themFormaQuestion, true);

            return $this->redirectToRoute('app_them_forma_questions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('them_forma_questions/new.html.twig', [
            'them_forma_question' => $themFormaQuestion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_them_forma_questions_show', methods: ['GET'])]
    public function show(ThemFormaQuestions $themFormaQuestion): Response
    {
        return $this->render('them_forma_questions/show.html.twig', [
            'them_forma_question' => $themFormaQuestion,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_them_forma_questions_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ThemFormaQuestions $themFormaQuestion, ThemFormaQuestionsRepository $themFormaQuestionsRepository): Response
    {
        $form = $this->createForm(ThemFormaQuestions3Type::class, $themFormaQuestion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $themFormaQuestionsRepository->save($themFormaQuestion, true);

            return $this->redirectToRoute('app_them_forma_questions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('them_forma_questions/edit.html.twig', [
            'them_forma_question' => $themFormaQuestion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_them_forma_questions_delete', methods: ['POST'])]
    public function delete(Request $request, ThemFormaQuestions $themFormaQuestion, ThemFormaQuestionsRepository $themFormaQuestionsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$themFormaQuestion->getId(), $request->request->get('_token'))) {
            $themFormaQuestionsRepository->remove($themFormaQuestion, true);
        }

        return $this->redirectToRoute('app_them_forma_questions_index', [], Response::HTTP_SEE_OTHER);
    }
}
