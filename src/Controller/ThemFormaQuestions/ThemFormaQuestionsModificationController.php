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
class ThemFormaQuestionsModificationController extends AbstractController
{
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
}
