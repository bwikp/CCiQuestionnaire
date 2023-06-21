<?php

namespace App\Controller\ReponseCandidat;

use App\Entity\ReponseCandidat;
use App\Form\ReponseCandidatType;
use App\Repository\ReponseCandidatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reponse/candidat')]
class ReponseCandidatSuppressionController extends AbstractController
{
    #[Route('/{id}', name: 'app_reponse_candidat_delete', methods: ['POST'])]
    public function delete(Request $request, ReponseCandidat $reponseCandidat, ReponseCandidatRepository $reponseCandidatRepository): Response
        {
            if ($this->isCsrfTokenValid('delete'.$reponseCandidat->getId(), $request->request->get('_token'))) {
                $reponseCandidatRepository->remove($reponseCandidat, true);
            }

            return $this->redirectToRoute('app_reponse_candidat_index', [], Response::HTTP_SEE_OTHER);
        }
}
