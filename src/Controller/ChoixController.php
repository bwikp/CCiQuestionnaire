<?php

namespace App\Controller;

use App\Entity\Choix;
use App\Form\ChoixType;
use App\Repository\ChoixRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/choix')]
class ChoixController extends AbstractController
{
    #[Route('/', name: 'app_choix_index', methods: ['GET'])]
    public function index(ChoixRepository $choixRepository): Response
    {
        return $this->render('choix/index.html.twig', [
            'choixes' => $choixRepository->findAll(),
        ]);
    }

    #[Route('/choix/new', name: 'app_choix_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ChoixRepository $choixRepository): Response
    {
        $choix = new Choix();
        $form = $this->createForm(ChoixType::class, $choix);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $choixRepository->save($choix, true);

            return $this->redirectToRoute('app_choix_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('choix/new.html.twig', [
            'choix' => $choix,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_choix_show', methods: ['GET'])]
    public function show(Choix $choix): Response
    {
        return $this->render('choix/show.html.twig', [
            'choix' => $choix,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_choix_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Choix $choix, ChoixRepository $choixRepository): Response
    {
        $form = $this->createForm(ChoixType::class, $choix);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $choixRepository->save($choix, true);

            return $this->redirectToRoute('app_choix_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('choix/edit.html.twig', [
            'choix' => $choix,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_choix_delete', methods: ['POST'])]
    public function delete(Request $request, Choix $choix, ChoixRepository $choixRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$choix->getId(), $request->request->get('_token'))) {
            $choixRepository->remove($choix, true);
        }

        return $this->redirectToRoute('app_choix_index', [], Response::HTTP_SEE_OTHER);
    }
}
