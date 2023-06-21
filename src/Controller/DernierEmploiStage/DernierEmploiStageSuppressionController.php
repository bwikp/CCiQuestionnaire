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
class DernierEmploiStageSuppressionController extends AbstractController
{
    #[Route('/{id}', name: 'app_dernier_emploi_stage_delete', methods: ['POST'])]
    public function delete(Request $request, DernierEmploiStage $dernierEmploiStage, DernierEmploiStageRepository $dernierEmploiStageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dernierEmploiStage->getId(), $request->request->get('_token'))) {
            $dernierEmploiStageRepository->remove($dernierEmploiStage, true);
        }

        return $this->redirectToRoute('app_dernier_emploi_stage_index', [], Response::HTTP_SEE_OTHER);
    }
}
