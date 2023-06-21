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
class ThematiqueCreationController extends AbstractController
{
    #[Route('/new', name: 'app_thematique_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ThematiqueRepository $thematiqueRepository): Response
    {
        $thematique = new Thematique();
        $form = $this->createForm(ThematiqueType::class, $thematique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $thematiqueRepository->save($thematique, true);

            return $this->redirectToRoute('app_thematique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('thematique/new.html.twig', [
            'thematique' => $thematique,
            'form' => $form,
        ]);
    }
}
