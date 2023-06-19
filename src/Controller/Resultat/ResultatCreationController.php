<?php

namespace App\Controller\Dossier;

use App\Entity\Resultat;
use App\Form\ResultatType;
use App\Repository\ResultatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/resultat')]
class ResultatCreationController extends AbstractController
{
   

    #[Route('/new', name: 'app_resultat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ResultatRepository $resultatRepository): Response
    {
        $resultat = new Resultat();
        $form = $this->createForm(ResultatType::class, $resultat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resultatRepository->save($resultat, true);

            return $this->redirectToRoute('app_resultat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('resultat/new.html.twig', [
            'resultat' => $resultat,
            'form' => $form,
        ]);
    }


}
