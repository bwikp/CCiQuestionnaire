<?php

namespace App\Controller\Motivation;

use App\Entity\Motivation;
use App\Form\MotivationType;
use App\Repository\MotivationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/motivation')]
class MotivationModificationController extends AbstractController
{

    #[Route('/{id}/edit', name: 'app_motivation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Motivation $motivation, MotivationRepository $motivationRepository): Response
    {
        $form = $this->createForm(MotivationType::class, $motivation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $motivationRepository->save($motivation, true);

            return $this->redirectToRoute('app_motivation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('motivation/edit.html.twig', [
            'motivation' => $motivation,
            'form' => $form,
        ]);
    }

}
