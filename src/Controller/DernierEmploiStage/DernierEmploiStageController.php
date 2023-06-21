<?php

namespace App\Controller\DernierEmploiStage;

use App\Entity\DernierEmploiStage;
use App\Form\DernierEmploiStageType;
use App\Repository\DernierEmploiStageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dernier/emploi/stage')]
class DernierEmploiStageController extends AbstractController
{
    #[Route('/', name: 'app_dernier_emploi_stage_index', methods: ['GET'])]
    public function index(DernierEmploiStageRepository $dernierEmploiStageRepository): Response
    {
        return $this->render('dernier_emploi_stage/index.html.twig', [
            'dernier_emploi_stages' => $dernierEmploiStageRepository->findAll(),
        ]);
    }

}
