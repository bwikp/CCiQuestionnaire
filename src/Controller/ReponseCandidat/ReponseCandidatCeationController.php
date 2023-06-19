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
class ReponseCandidatCeationController extends AbstractController
{
   

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

}
