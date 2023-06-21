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
class QuestionCorrigerShowController extends AbstractController
{

    #[Route('/{id}', name: 'app_question_corriger_show', methods: ['GET'])]
    public function show(QuestionCorriger $questionCorriger): Response
    {
        return $this->render('question_corriger/show.html.twig', [
            'question_corriger' => $questionCorriger,
        ]);
    }
}