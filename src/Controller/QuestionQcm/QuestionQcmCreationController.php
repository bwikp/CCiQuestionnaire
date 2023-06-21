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
class QuestionQcmCreationController extends AbstractController
{
   

    #[Route('/new', name: 'app_question_qcm_new', methods: ['GET', 'POST'])]
    public function new(Request $request, QuestionQcmRepository $questionQcmRepository): Response
    {
        $questionQcm = new QuestionQcm();
        $form = $this->createForm(QuestionQcm1Type::class, $questionQcm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionQcmRepository->save($questionQcm, true);

            return $this->redirectToRoute('app_question_qcm_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('question_qcm/new.html.twig', [
            'question_qcm' => $questionQcm,
            'form' => $form,
        ]);
    }

}
