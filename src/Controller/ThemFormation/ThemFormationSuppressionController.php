<?php

namespace App\Controller\ThemFormation;

use App\Entity\ThemFormation;
use App\Form\ThemFormationType;
use App\Repository\ThemFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/them/formation')]
class ThemFormationSuppressionController extends AbstractController
{
    #[Route('/{id}', name: 'app_them_formation_delete', methods: ['POST'])]
    public function delete(Request $request, ThemFormation $themFormation, ThemFormationRepository $themFormationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $themFormation->getId(), $request->request->get('_token'))) {
            $themFormationRepository->remove($themFormation, true);
        }

        return $this->redirectToRoute('app_them_formation_index', [], Response::HTTP_SEE_OTHER);
    }
}
