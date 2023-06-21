<?php

namespace App\Controller\DerniereFormation;

use App\Entity\DerniereFormation;
use App\Form\DerniereFormationType;
use App\Repository\DerniereFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/derniere/formation')]
class DerniereFormationModificationController extends AbstractController
{
   
    #[Route('/{id}/edit', name: 'app_derniere_formation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DerniereFormation $derniereFormation, DerniereFormationRepository $derniereFormationRepository): Response
    {
        $form = $this->createForm(DerniereFormationType::class, $derniereFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $derniereFormationRepository->save($derniereFormation, true);

            return $this->redirectToRoute('app_derniere_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('derniere_formation/edit.html.twig', [
            'derniere_formation' => $derniereFormation,
            'form' => $form,
        ]);
    }

}
