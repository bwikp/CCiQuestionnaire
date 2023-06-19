<?php

namespace App\Controller\Dossier;

use App\Entity\ReponseCandidat;
use App\Form\ReponseCandidatType;
use App\Repository\ReponseCandidatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reponse/candidat')]
class ReponseCandidatModificationController extends AbstractController
{

   

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

}
