<?php

namespace App\Controller\Thematique;

use App\Entity\Thematique;
use App\Form\ThematiqueType;
use App\Repository\ThematiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/thematique')]
class ThematiqueModificationController extends AbstractController
{
    #[Route('/{id}/edit', name: 'app_thematique_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Thematique $thematique, ThematiqueRepository $thematiqueRepository): Response
    {
        $form = $this->createForm(ThematiqueType::class, $thematique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $thematiqueRepository->save($thematique, true);

            return $this->redirectToRoute('app_thematique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('thematique/edit.html.twig', [
            'thematique' => $thematique,
            'form' => $form,
        ]);
    }
}
