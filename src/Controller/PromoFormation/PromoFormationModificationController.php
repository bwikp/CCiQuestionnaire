<?php

namespace App\Controller\PromoFormation;

use App\Entity\PromoFormation;
use App\Form\PromoFormationType;
use App\Repository\PromoFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/promo/formation')]
class PromoFormationModificationController extends AbstractController
{
    #[Route('/{id}/edit', name: 'app_promo_formation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PromoFormation $promoFormation, PromoFormationRepository $promoFormationRepository): Response
    {
        $form = $this->createForm(PromoFormationType::class, $promoFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $promoFormationRepository->save($promoFormation, true);

            return $this->redirectToRoute('app_promo_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('promo_formation/edit.html.twig', [
            'promo_formation' => $promoFormation,
            'form' => $form,
        ]);
    }
}
