<?php

namespace App\Controller\ThemFormation;

use App\Entity\ThemFormation;
use App\Form\ThemFormationType;
use App\Repository\ThemFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/them/formation')]
class ThemFormationModificationController extends AbstractController
{
    #[Route('/{id}/edit', name: 'app_them_formation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ThemFormation $themFormation, ThemFormationRepository $themFormationRepository): Response
    {
        $form = $this->createForm(ThemFormationType::class, $themFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $themFormationRepository->save($themFormation, true);

            return $this->redirectToRoute('app_them_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('them_formation/edit.html.twig', [
            'them_formation' => $themFormation,
            'form' => $form,
        ]);
    }
}
