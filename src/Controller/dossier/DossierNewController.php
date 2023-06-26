<?php

namespace App\Controller\dossier;

use App\Entity\Dossier;
use App\Form\Dossier2Type;
use App\Repository\DossierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dossier')]
class DossierNewController extends AbstractController
{
    #[Route('/new', name: 'app_dossier_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DossierRepository $dossierRepository): Response
    {
        $dossier = new Dossier();
        $form = $this->createForm(Dossier2Type::class, $dossier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dossierRepository->save($dossier, true);

            return $this->redirectToRoute('app_dossier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dossier/new.html.twig', [
            'dossier' => $dossier,
            'form' => $form,
        ]);
    }
}