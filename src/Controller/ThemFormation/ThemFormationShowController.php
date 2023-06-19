<?php

namespace App\Controller\ThemFormation;

use App\Entity\ThemFormation;
use App\Form\ThemFormationType;
use App\Repository\ThemFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/them/formation')]
class ThemFormationShowController extends AbstractController
{
    #[Route('/{id}', name: 'app_them_formation_show', methods: ['GET'])]
    public function show(ThemFormation $themFormation): Response
    {
        return $this->render('them_formation/show.html.twig', [
            'them_formation' => $themFormation,
        ]);
    }
}
