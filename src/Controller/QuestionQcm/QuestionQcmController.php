<?php

namespace App\Controller\QuestionQcm;

use App\Entity\QuestionQcm;
use App\Form\QuestionQcm1Type;
use App\Repository\QuestionQcmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/questions/qcm')]
class QuestionQcmController extends AbstractController
{
    #[Route('/', name: 'app_question_qcm_index', methods: ['GET'])]
    public function index(QuestionQcmRepository $questionQcmRepository): Response
    {
        return $this->render('question_qcm/index.html.twig', [
            'question_qcms' => $questionQcmRepository->findAll(),
        ]);
    }

    
   

}
