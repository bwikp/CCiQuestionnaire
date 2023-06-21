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
class DernierEmploiStageCreationController extends AbstractController
{
    #[Route('/new', name: 'app_dernier_emploi_stage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DernierEmploiStageRepository $dernierEmploiStageRepository): Response
    {
        $dernierEmploiStage = new DernierEmploiStage();
        $form = $this->createForm(DernierEmploiStageType::class, $dernierEmploiStage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dernierEmploiStageRepository->save($dernierEmploiStage, true);

            return $this->redirectToRoute('app_dernier_emploi_stage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dernier_emploi_stage/new.html.twig', [
            'dernier_emploi_stage' => $dernierEmploiStage,
            'form' => $form,
        ]);
    }
}
