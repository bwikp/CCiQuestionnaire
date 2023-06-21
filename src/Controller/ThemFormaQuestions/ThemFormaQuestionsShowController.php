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
class ThemFormaQuestionsShowController extends AbstractController
{
   
    #[Route('/{id}', name: 'app_them_forma_questions_show', methods: ['GET'])]
    public function show(ThemFormaQuestions $themFormaQuestion): Response
    {
        return $this->render('them_forma_questions/show.html.twig', [
            'them_forma_question' => $themFormaQuestion,
        ]);
    }

   
}
