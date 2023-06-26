<?php

namespace App\Controller\QuestionRemplir;

use App\Entity\QuestionRemplir;
use App\Form\QuestionRemplirType;
use App\Repository\QuestionRemplirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/questions/remplir')]
class QuestionRemplirController extends AbstractController
{
    #[Route('/', name: 'app_question_remplir_index', methods: ['GET'])]
    public function index(QuestionRemplirRepository $questionRemplirRepository): Response
    {
        return $this->render('question_remplir/index.html.twig', [
            'question_remplirs' => $questionRemplirRepository->findAll(),
        ]);
    }

}
