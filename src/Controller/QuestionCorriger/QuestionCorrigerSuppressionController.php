<?php

namespace App\Controller\QuestionCorriger;

use App\Entity\QuestionCorriger;
use App\Repository\QuestionCorrigerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/questions/corriger')]
class QuestionCorrigerSuppressionController extends AbstractController
{
    #[Route('/{id}', name: 'app_question_corriger_delete', methods: ['POST'])]
    public function delete(Request $request, QuestionCorriger $questionCorriger, QuestionCorrigerRepository $questionCorrigerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$questionCorriger->getId(), $request->request->get('_token'))) {
            $questionCorrigerRepository->remove($questionCorriger, true);
        }

        return $this->redirectToRoute('app_question_corriger_index', [], Response::HTTP_SEE_OTHER);
    }
}