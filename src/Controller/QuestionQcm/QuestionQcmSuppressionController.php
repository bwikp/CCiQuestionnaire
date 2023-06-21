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
class QuestionQcmSuppressionController extends AbstractController
{
    #[Route('/{id}', name: 'app_question_qcm_delete', methods: ['POST'])]
    public function delete(Request $request, QuestionQcm $questionQcm, QuestionQcmRepository $questionQcmRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$questionQcm->getId(), $request->request->get('_token'))) {
            $questionQcmRepository->remove($questionQcm, true);
        }

        return $this->redirectToRoute('app_question_qcm_index', [], Response::HTTP_SEE_OTHER);
    }
}
