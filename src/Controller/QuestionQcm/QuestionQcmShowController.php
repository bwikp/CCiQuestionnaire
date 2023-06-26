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
class QuestionQcmShowController extends AbstractController
{
  

    #[Route('/{id}', name: 'app_question_qcm_show', methods: ['GET'])]
    public function show(QuestionQcm $questionQcm): Response
    {
        return $this->render('question_qcm/show.html.twig', [
            'question_qcm' => $questionQcm,
        ]);
    }

}
