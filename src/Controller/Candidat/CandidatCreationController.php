<?php

namespace App\Controller\Candidat;

use App\Entity\Candidat;
use App\Form\CandidatType;
use App\Repository\CandidatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/candidat')]
class CandidatCreationController extends AbstractController
{
    #[Route('/new', name: 'app_candidat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CandidatRepository $candidatRepository): Response
    {
        $candidat = new Candidat();
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $candidatRepository->save($candidat, true);

            return $this->redirectToRoute('app_candidat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('candidat/new.html.twig', [
            'candidat' => $candidat,
            'form' => $form,
        ]);
    }
}
