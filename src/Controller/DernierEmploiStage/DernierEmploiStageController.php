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
            'dernierEmploiStage' => $dernierEmploiStageRepository->findAll(),
        ]);
    }

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

        return $this->render('dernier_emploi_stage/new.html.twig', [
            'dernierEmploiStage' => $dernierEmploiStage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dernier_emploi_stage_show', methods: ['GET'])]
    public function show($id,DernierEmploiStage $dernierEmploiStage,DernierEmploiStageRepository $dernierEmploiStageRepository): Response
    {
        return $this->render('dernier_emploi_stage/show.html.twig', [
            'dernierEmploiStage' => $dernierEmploiStageRepository->findBy(['dossier_id'=> $id ]),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_dernier_emploi_stage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DernierEmploiStage $dernierEmploiStage, DernierEmploiStageRepository $dernierEmploiStageRepository): Response
    {
        $form = $this->createForm(DernierEmploiStageType::class, $dernierEmploiStage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dernierEmploiStageRepository->save($dernierEmploiStage, true);

            return $this->redirectToRoute('app_dernier_emploi_stage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dernier_emploi_stage/edit.html.twig', [
            'dernierEmploiStage' => $dernierEmploiStage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dernier_emploi_stage_delete', methods: ['POST'])]
    public function delete(Request $request, DernierEmploiStage $dernierEmploiStage, DernierEmploiStageRepository $dernierEmploiStageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dernierEmploiStage->getId(), $request->request->get('_token'))) {
            $dernierEmploiStageRepository->remove($dernierEmploiStage, true);
        }

        return $this->redirectToRoute('app_dernier_emploi_stage_index', [], Response::HTTP_SEE_OTHER);
    }
}
