<?php

namespace App\Controller;

use App\Repository\FormationRepository;
use App\Repository\QuestionsRepository;
use App\Repository\ThemFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestesController extends AbstractController
{
    #[Route('/testes', name: 'app_testes')]
    public function index(FormationRepository $formationRepository, QuestionsRepository $questionsRepository, ThemFormationRepository $themFormationRepository): Response
    {
        $themForm = $themFormationRepository->findOneBy(
            ['formation' => 24],
        );


        $test = $themFormationRepository->findBy(array('formation' => 24));
        $question = $questionsRepository->findBy(array('type' => 24));

        // dd($question);
        return $this->render('testes/index.html.twig', [
            'controller_name' => 'TestesController',
            'formations' => $formationRepository->findAll(),
            'questions' => $question,
        ]);
    }
}
