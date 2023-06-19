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
class PromoFormationShowController extends AbstractController
{
    #[Route('/{id}', name: 'app_promo_formation_show', methods: ['GET'])]
    public function show(PromoFormation $promoFormation): Response
    {
        return $this->render('promo_formation/show.html.twig', [
            'promo_formation' => $promoFormation,
        ]);
    }
}
