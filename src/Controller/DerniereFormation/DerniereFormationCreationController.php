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
class DerniereFormationCreationController extends AbstractController
{
   

    #[Route('/new', name: 'app_derniere_formation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DerniereFormationRepository $derniereFormationRepository): Response
    {
        $derniereFormation = new DerniereFormation();
        $form = $this->createForm(DerniereFormationType::class, $derniereFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $derniereFormationRepository->save($derniereFormation, true);

            return $this->redirectToRoute('app_derniere_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('derniere_formation/new.html.twig', [
            'derniere_formation' => $derniereFormation,
            'form' => $form,
        ]);
    }

}
