<?php

namespace App\Controller\Motivation;

use App\Entity\Motivation;
use App\Form\MotivationType;
use App\Repository\MotivationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/motivation')]
class MotivationCreationController extends AbstractController
{

    #[Route('/new', name: 'app_motivation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MotivationRepository $motivationRepository): Response
    {
        $motivation = new Motivation();
        $form = $this->createForm(MotivationType::class, $motivation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $motivationRepository->save($motivation, true);

            return $this->redirectToRoute('app_motivation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('motivation/new.html.twig', [
            'motivation' => $motivation,
            'form' => $form,
        ]);
    }

}
