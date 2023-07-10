<?php

namespace App\Controller\Testes;

use App\Repository\QuestionQcmRepository;
use App\Repository\QuestionCorrigerRepository;
use App\Repository\QuestionRemplirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestesController extends AbstractController
{
    #[Route('/testes', name: 'app_testes')]
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

        ]);
    }
}
