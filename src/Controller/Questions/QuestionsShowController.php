<?php

namespace App\Controller\Dossier;

use App\Entity\Questions;
use App\Form\QuestionsType;
use App\Repository\QuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/questions')]
class QuestionsShowController extends AbstractController
{

    #[Route('/{id}', name: 'app_questions_show', methods: ['GET'])]
    public function show(Questions $question): Response
        {
            return $this->render('questions/show.html.twig', [
                'question' => $question,
            ]);
        }

}
