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
class PromoFormationSuppressionController extends AbstractController
{
    #[Route('/{id}', name: 'app_promo_formation_delete', methods: ['POST'])]
    public function delete(Request $request, PromoFormation $promoFormation, PromoFormationRepository $promoFormationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$promoFormation->getId(), $request->request->get('_token'))) {
            $promoFormationRepository->remove($promoFormation, true);
        }

        return $this->redirectToRoute('app_promo_formation_index', [], Response::HTTP_SEE_OTHER);
    }
}
