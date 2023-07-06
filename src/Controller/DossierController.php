<?php

namespace App\Controller;

use App\Entity\Dossier;
use App\Entity\ThemFormaQuestions;
use App\Form\DossierType;
use App\Repository\CandidatRepository;
use App\Repository\DernierEmploiStageRepository;
use App\Entity\DernierEmploiStage;
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

    #[Route('/new', name: 'app_dossier_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DossierRepository $dossierRepository): Response
    {
        $dossier = new Dossier();
        $form = $this->createForm(DossierType::class, $dossier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dossierRepository->save($dossier, true);

            return $this->redirectToRoute('app_dossier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dossier/new.html.twig', [
            'dossier' => $dossier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dossier_show', methods: ['GET'])]
    public function show(Dossier $dossier,DernierEmploiStage $dernierEmploiStage): Response
    {
        return $this->render('dossier/show.html.twig', [
            'dossier' => $dossier,
            'dernierEmploiStage' => $dernierEmploiStage
        ]);
    }

    #[Route('/{id}/edit', name: 'app_dossier_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Dossier $dossier, DossierRepository $dossierRepository): Response
    {
        $form = $this->createForm(DossierType::class, $dossier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dossierRepository->save($dossier, true);

            return $this->redirectToRoute('app_dossier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dossier/edit.html.twig', [
            'dossier' => $dossier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dossier_delete', methods: ['POST'])]
    public function delete(Request $request, Dossier $dossier, DossierRepository $dossierRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $dossier->getId(), $request->request->get('_token'))) {
            $dossierRepository->remove($dossier, true);
        }

        return $this->redirectToRoute('app_dossier_index', [], Response::HTTP_SEE_OTHER);
    }
}
