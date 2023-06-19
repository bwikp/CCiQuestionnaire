<?php

namespace App\Controller\Questions;
<<<<<<< HEAD

=======
>>>>>>> 3c1aed39722ae8dff3efbaff7c8b4e98562946b5
use App\Entity\Questions;
use App\Form\QuestionsType;
use App\Repository\QuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/questions')]
class QuestionsModificationController extends AbstractController
{


    #[Route('/{id}/edit', name: 'app_questions_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Questions $question, QuestionsRepository $questionsRepository): Response
    {
            $form = $this->createForm(QuestionsType::class, $question);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $questionsRepository->save($question, true);

                return $this->redirectToRoute('app_questions_index', [], Response::HTTP_SEE_OTHER);
            }

            return $this->renderForm('questions/edit.html.twig', [
                'question' => $question,
                'form' => $form,
            ]);
    }

}
