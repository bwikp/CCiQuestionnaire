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
class DossierModificationController extends AbstractController
{
   



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

   
}
