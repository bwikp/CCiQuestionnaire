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
class QuestionQcmModificationController extends AbstractController
{
   

    #[Route('/{id}/edit', name: 'app_question_qcm_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, QuestionQcm $questionQcm, QuestionQcmRepository $questionQcmRepository): Response
    {
        $form = $this->createForm(QuestionQcm1Type::class, $questionQcm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionQcmRepository->save($questionQcm, true);

            return $this->redirectToRoute('app_question_qcm_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('question_qcm/edit.html.twig', [
            'question_qcm' => $questionQcm,
            'form' => $form,
        ]);
    }

}
