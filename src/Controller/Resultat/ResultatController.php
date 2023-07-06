<?php

namespace App\Controller\Resultat;

use App\Entity\Resultat;
use App\Form\Resultat1Type;
use App\Repository\FormationRepository;
use App\Repository\PromotionRepository;
use App\Repository\ResultatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/resultat')]
class ResultatController extends AbstractController
{

    #[Route('/filtre/{id}', name: 'app_resultat_promo', methods: ['GET', 'POST'])]
    public function filtre_promo($id, PromotionRepository $promotionRepository)
    {
        return $this->render('promotion/show.html.twig', [
            'promotion' => $promotionRepository->findBy(["id" => $id])
        ]);
    }

    #[Route('/filtre/{id}', name: 'app_resultat_forma', methods: ['GET', 'POST'])]
    public function filtre_forma($id, FormationRepository $formationRepository)
    {
        return $this->render('formation/show.html.twig', [
            'formation' => $formationRepository->findBy(["id" => $id])
        ]);
    }



    #[Route('/', name: 'app_resultat_index', methods: ['GET'])]
    public function index(ResultatRepository $resultatRepository, PromotionRepository $promoRepo, FormationRepository $formarepo): Response
    {
        return $this->render('resultat/index.html.twig', [
            'resultats' => $resultatRepository->findAll(),
            "promos" => $promoRepo->findAll(),
            "formations" => $formarepo->findAll()
        ]);
    }

    #[Route('/new', name: 'app_resultat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ResultatRepository $resultatRepository): Response
    {
        $resultat = new Resultat();
        $form = $this->createForm(Resultat1Type::class, $resultat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resultatRepository->save($resultat, true);

            return $this->redirectToRoute('app_resultat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('resultat/new.html.twig', [
            'resultat' => $resultat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_resultat_show', methods: ['GET'])]
    public function show(Resultat $resultat): Response
    {
        return $this->render('resultat/show.html.twig', [
            'resultat' => $resultat,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_resultat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Resultat $resultat, ResultatRepository $resultatRepository): Response
    {
        $form = $this->createForm(Resultat1Type::class, $resultat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resultatRepository->save($resultat, true);

            return $this->redirectToRoute('app_resultat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('resultat/edit.html.twig', [
            'resultat' => $resultat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_resultat_delete', methods: ['POST'])]
    public function delete(Request $request, Resultat $resultat, ResultatRepository $resultatRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $resultat->getId(), $request->request->get('_token'))) {
            $resultatRepository->remove($resultat, true);
        }

        return $this->redirectToRoute('app_resultat_index', [], Response::HTTP_SEE_OTHER);
    }
}
