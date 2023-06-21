<?php

namespace App\Controller\DerniereFormation;

use App\Entity\DerniereFormation;
use App\Form\DerniereFormationType;
use App\Repository\DerniereFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/derniere/formation')]
class DerniereFormationSuppressionController extends AbstractController
{


    #[Route('/{id}', name: 'app_derniere_formation_delete', methods: ['POST'])]
    public function delete(Request $request, DerniereFormation $derniereFormation, DerniereFormationRepository $derniereFormationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$derniereFormation->getId(), $request->request->get('_token'))) {
            $derniereFormationRepository->remove($derniereFormation, true);
        }

        return $this->redirectToRoute('app_derniere_formation_index', [], Response::HTTP_SEE_OTHER);
    }
}
