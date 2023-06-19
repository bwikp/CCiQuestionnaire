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
class PromoFormationController extends AbstractController
{
    #[Route('/', name: 'app_promo_formation_index', methods: ['GET'])]
    public function index(PromoFormationRepository $promoFormationRepository): Response
    {
        return $this->render('promo_formation/index.html.twig', [
            'promo_formations' => $promoFormationRepository->findAll(),
        ]);
    }
}
