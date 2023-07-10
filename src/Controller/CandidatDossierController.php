<?php

namespace App\Controller;

use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidatDossierController extends AbstractController
{
    #[Route('/candidatdossier', name: 'app_candidat_dossier')]
    public function index(FormationRepository $formationRepository): Response
    {
        $formations = $formationRepository;
        return $this->render('candidat_dossier/index.html.twig', [
            'controller_name' => 'CandidatDossierController',
            'formation' => $formations
        ]);
    }
}
