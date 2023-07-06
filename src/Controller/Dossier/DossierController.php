<?php

namespace App\Controller\Dossier;

use App\Entity\Dossier;
use App\Entity\ThemFormaQuestions;
use App\Form\Dossier1Type;
use App\Repository\CandidatRepository;
use App\Repository\DossierRepository;
use App\Repository\PromoFormationRepository;
use App\Repository\ThemFormaQuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dossier')]
class DossierController extends AbstractController
{
    #[Route('/', name: 'app_dossier_index', methods: ['GET'])]
    public function index(
        DossierRepository $dossierRepository,
        PromoFormationRepository $promoFormationRepository,
        CandidatRepository $candidatRepository,
        ThemFormaQuestionsRepository $themFormaQuestionsRepository
    ): Response {
        return $this->render('dossier/index.html.twig', [
            'dossiers' => $dossierRepository->findAll(),
            'promoformation' => $promoFormationRepository->findAll(),
            'candidat' => $candidatRepository->findAll(),
            'themformaquestions' => $themFormaQuestionsRepository->findAll()
        ]);
    }
}
