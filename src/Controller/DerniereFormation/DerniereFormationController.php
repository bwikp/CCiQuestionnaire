<?php

namespace App\Controller\DerniereFormation;

use App\Entity\DerniereFormation;
use App\Form\DerniereFormationType;
use App\Repository\DerniereFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/derniere/formation')]
class DerniereFormationController extends AbstractController
{
    #[Route('/', name: 'app_derniere_formation_index', methods: ['GET'])]
    public function index(DerniereFormationRepository $derniereFormationRepository): Response
    {
        return $this->render('derniere_formation/index.html.twig', [
            'derniere_formations' => $derniereFormationRepository->findAll(),
        ]);
    }

}
