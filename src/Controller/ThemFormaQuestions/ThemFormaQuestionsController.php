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
class ThemFormaQuestionsController extends AbstractController
{
    #[Route('/', name: 'app_them_forma_questions_index', methods: ['GET'])]
    public function index(ThemFormaQuestionsRepository $themFormaQuestionsRepository): Response
    {
        return $this->render('them_forma_questions/index.html.twig', [
            'them_forma_questions' => $themFormaQuestionsRepository->findAll(),
        ]);
    }

}
