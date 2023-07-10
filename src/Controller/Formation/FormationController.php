<?php

namespace App\Controller\Formation;

use App\Entity\Formation;
use App\Form\FormationType;
use App\Repository\FormationRepository;
use App\Repository\QuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/formation')]
class FormationController extends AbstractController
{
    #[Route('/', name: 'app_formation_index', methods: ['GET'])]
    public function index(FormationRepository $formationRepository, QuestionsRepository $questionsRepository): Response
    {
        // $formation = $formationRepository->findSearch();
        // $question = $questionsRepository->findBy(array('id_type' => 1));

        // dd($question);
        return $this->render('formation/index.html.twig', [
            'formations' => $formationRepository->findAll(),
            // 'questions' => $question,
            'test' => 'test'
        ]);
    }
}
