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
class ThematiqueShowController extends AbstractController
{
    #[Route('/{id}', name: 'app_thematique_show', methods: ['GET'])]
    public function show(Thematique $thematique): Response
    {
        return $this->render('thematique/show.html.twig', [
            'thematique' => $thematique,
        ]);
    }
}
