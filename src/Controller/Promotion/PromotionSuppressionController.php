<?php

namespace App\Controller\Promotion;

use App\Entity\Promotion;
use App\Form\PromotionType;
use App\Repository\PromotionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/promotion')]
class PromotionSuppressionController extends AbstractController
{
    #[Route('/{id}', name: 'app_promotion_delete', methods: ['POST'])]
    public function delete(Request $request, Promotion $promotion, PromotionRepository $promotionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $promotion->getId(), $request->request->get('_token'))) {
            $promotionRepository->remove($promotion, true);
        }

        return $this->redirectToRoute('app_promotion_index', [], Response::HTTP_SEE_OTHER);
    }
}
