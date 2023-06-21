<?php

namespace App\Controller\QuestionRemplir;

use App\Entity\QuestionRemplir;
use App\Form\QuestionRemplirType;
use App\Repository\QuestionRemplirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/question/remplir')]
class QuestionRemplirController extends AbstractController
{
   
    #[Route('/{id}', name: 'app_question_remplir_delete', methods: ['POST'])]
    public function delete(Request $request, QuestionRemplir $questionRemplir, QuestionRemplirRepository $questionRemplirRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$questionRemplir->getId(), $request->request->get('_token'))) {
            $questionRemplirRepository->remove($questionRemplir, true);
        }

        return $this->redirectToRoute('app_question_remplir_index', [], Response::HTTP_SEE_OTHER);
    }
}
