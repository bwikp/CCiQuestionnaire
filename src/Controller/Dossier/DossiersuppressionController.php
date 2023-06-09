<?php

namespace App\Controller\Dossier;

use App\Entity\Dossier;
use App\Form\DossierType;
use App\Repository\DossierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dossier')]
class DossiersuppressionController extends AbstractController
{

    #[Route('/{id}', name: 'app_dossier_delete', methods: ['POST'])]
        public function delete(Request $request, Dossier $dossier, DossierRepository $dossierRepository): Response
            {
                 if ($this->isCsrfTokenValid('delete'.$dossier->getId(), $request->request->get('_token'))) {
                $dossierRepository->remove($dossier, true);
             }

             return $this->redirectToRoute('app_dossier_index', [], Response::HTTP_SEE_OTHER);
            }

   
}
