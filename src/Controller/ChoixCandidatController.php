<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Repository\FormationRepository;
use App\Repository\PromotionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ChoixCandidatController extends AbstractController
{
    #[Route('/choix/candidat', name: 'app_choix_candidat')]
    public function index(FormationRepository $formationRepository, PromotionRepository $promotionRepository): Response
    {
        $formations = $formationRepository->findAll();
        $promotions = $promotionRepository->findAll();
        return $this->render('choix_candidat/index.html.twig', [
            'controller_name' => 'ChoixCandidatController',
            'formations' => $formations,
            'promotions' => $promotions
        ]);
    }
}
