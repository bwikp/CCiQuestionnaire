<?php

namespace App\Controller;

use App\Entity\ReponseCandidat;
use App\Form\ReponseCandidatType;
use App\Repository\ReponseCandidatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reponse/candidat')]
class ReponseCandidatController extends AbstractController
{
    #[Route('/', name: 'app_reponse_candidat_index', methods: ['GET'])]
    public function index(ReponseCandidatRepository $reponseCandidatRepository): Response
    {
        return $this->render('reponse_candidat/index.html.twig', [
            'reponse_candidats' => $reponseCandidatRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reponse_candidat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReponseCandidatRepository $reponseCandidatRepository): Response
    {
        $reponseCandidat = new ReponseCandidat();
        $form = $this->createForm(ReponseCandidatType::class, $reponseCandidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reponseCandidatRepository->save($reponseCandidat, true);

            return $this->redirectToRoute('app_reponse_candidat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reponse_candidat/new.html.twig', [
            'reponse_candidat' => $reponseCandidat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reponse_candidat_show', methods: ['GET'])]
    public function show(ReponseCandidat $reponseCandidat): Response
    {
        return $this->render('reponse_candidat/show.html.twig', [
            'reponse_candidat' => $reponseCandidat,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reponse_candidat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReponseCandidat $reponseCandidat, ReponseCandidatRepository $reponseCandidatRepository): Response
    {
        $form = $this->createForm(ReponseCandidatType::class, $reponseCandidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reponseCandidatRepository->save($reponseCandidat, true);

            return $this->redirectToRoute('app_reponse_candidat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reponse_candidat/edit.html.twig', [
            'reponse_candidat' => $reponseCandidat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reponse_candidat_delete', methods: ['POST'])]
    public function delete(Request $request, ReponseCandidat $reponseCandidat, ReponseCandidatRepository $reponseCandidatRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reponseCandidat->getId(), $request->request->get('_token'))) {
            $reponseCandidatRepository->remove($reponseCandidat, true);
        }

        return $this->redirectToRoute('app_reponse_candidat_index', [], Response::HTTP_SEE_OTHER);
    }
}
