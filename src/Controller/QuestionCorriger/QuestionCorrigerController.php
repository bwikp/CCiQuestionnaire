<?php

namespace App\Controller\QuestionCorriger;

use App\Entity\QuestionCorriger;
use App\Form\QuestionCorrigerType;
use App\Repository\QuestionCorrigerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/questions/corriger')]
class QuestionCorrigerController extends AbstractController
{

#[Route('/', name: 'app_question_corriger_index', methods: ['GET'])]
    public function index(QuestionCorrigerRepository $questionCorrigerRepository): Response
    {
        return $this->render('question_corriger/index.html.twig', [
            'question_corrigers' => $questionCorrigerRepository->findAll(),
        ]);
    }
}
