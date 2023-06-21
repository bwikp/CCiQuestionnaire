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
class ThematiqueController extends AbstractController
{
    #[Route('/', name: 'app_thematique_index', methods: ['GET'])]
    public function index(ThematiqueRepository $thematiqueRepository): Response
    {
        return $this->render('thematique/index.html.twig', [
            'thematiques' => $thematiqueRepository->findAll(),
        ]);
    }
}
