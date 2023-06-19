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
class ThemFormationController extends AbstractController
{
    #[Route('/', name: 'app_them_formation_index', methods: ['GET'])]
    public function index(ThemFormationRepository $themFormationRepository): Response
    {
        return $this->render('them_formation/index.html.twig', [
            'them_formations' => $themFormationRepository->findAll(),
        ]);
    }
}
