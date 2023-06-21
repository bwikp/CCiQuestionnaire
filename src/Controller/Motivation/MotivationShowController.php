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
class MotivationShowController extends AbstractController
{

    #[Route('/{id}', name: 'app_motivation_show', methods: ['GET'])]
    public function show(Motivation $motivation): Response
    {
        return $this->render('motivation/show.html.twig', [
            'motivation' => $motivation,
        ]);
    }

}
