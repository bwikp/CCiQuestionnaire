<?php

namespace App\Controller\Dossier;

use App\Entity\ThemFormaQuestions;
use App\Form\ThemFormaQuestionsType;
use App\Repository\ThemFormaQuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/them/forma/questions')]
class ThemFormaQuestionsSuppressionController extends AbstractController
{
   

    #[Route('/{id}', name: 'app_them_forma_questions_delete', methods: ['POST'])]
    public function delete(Request $request, ThemFormaQuestions $themFormaQuestion, ThemFormaQuestionsRepository $themFormaQuestionsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$themFormaQuestion->getId(), $request->request->get('_token'))) {
            $themFormaQuestionsRepository->remove($themFormaQuestion, true);
        }

        return $this->redirectToRoute('app_them_forma_questions_index', [], Response::HTTP_SEE_OTHER);
    }
}
