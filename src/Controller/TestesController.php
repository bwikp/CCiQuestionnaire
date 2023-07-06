<?php

namespace App\Controller;

<<<<<<< HEAD
use App\Repository\FormationRepository;
use App\Repository\QuestionsRepository;
use App\Repository\ThemFormationRepository;
=======
use App\Repository\QuestionQcmRepository;
use App\Repository\QuestionCorrigerRepository;
use App\Repository\QuestionRemplirRepository;
>>>>>>> 80e0cfa8a4a3ac17105a7cc4b9bb9b43c3857a9d
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestesController extends AbstractController
{
    #[Route('/testes', name: 'app_testes')]
<<<<<<< HEAD
    public function index(FormationRepository $formationRepository, QuestionsRepository $questionsRepository, ThemFormationRepository $themFormationRepository): Response
    {
        $themForm = $themFormationRepository->findOneBy(
            ['formation' => 24],
        );


        $test = $themFormationRepository->findBy(array('formation' => 24));
        $question = $questionsRepository->findAll();

        // dd($question);
        return $this->render('testes/index.html.twig', [
            'controller_name' => 'TestesController',
            'formations' => $formationRepository->findAll(),
            'questions' => $question,
=======
    public function index(
        QuestionRemplirRepository $questionRemplirRepository,
        QuestionCorrigerRepository $questionCorrigerRepository,
        QuestionQcmRepository $questionQcmRepository
    ): Response {



        return $this->render('testes/index.html.twig', [
            'controller_name' => 'TestesController',
            'questionsremplir' => $questionRemplirRepository->findAll(),
            'questionscorrige' => $questionCorrigerRepository->findAll(),
            'questionsqcm' => $questionQcmRepository->findAll()

>>>>>>> 80e0cfa8a4a3ac17105a7cc4b9bb9b43c3857a9d
        ]);
    }
}
