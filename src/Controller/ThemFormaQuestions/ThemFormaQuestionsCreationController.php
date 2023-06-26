<?php

namespace App\Controller\ThemFormaQuestions;

use App\Entity\ThemFormaQuestions;
use App\Form\ThemFormaQuestionsType;
use App\Repository\ThemFormaQuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/them/forma/questions')]
class ThemFormaQuestionsCreationController extends AbstractController
{
    

    #[Route('/new', name: 'app_them_forma_questions_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ThemFormaQuestionsRepository $themFormaQuestionsRepository): Response
    {
        $themFormaQuestion = new ThemFormaQuestions();
        $form = $this->createForm(ThemFormaQuestionsType::class, $themFormaQuestion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $themFormaQuestionsRepository->save($themFormaQuestion, true);

            return $this->redirectToRoute('app_them_forma_questions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('them_forma_questions/new.html.twig', [
            'them_forma_question' => $themFormaQuestion,
            'form' => $form,
        ]);
    }

    
}
