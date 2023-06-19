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
class DernierEmploiStageShowController extends AbstractController
{

    #[Route('/{id}', name: 'app_dernier_emploi_stage_show', methods: ['GET'])]
    public function show(DernierEmploiStage $dernierEmploiStage): Response
    {
        return $this->render('dernier_emploi_stage/show.html.twig', [
            'dernier_emploi_stage' => $dernierEmploiStage,
        ]);
    }}