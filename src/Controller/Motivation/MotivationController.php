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
class MotivationController extends AbstractController
{
    #[Route('/', name: 'app_motivation_index', methods: ['GET'])]
    public function index(MotivationRepository $motivationRepository): Response
    {
        return $this->render('motivation/index.html.twig', [
            'motivations' => $motivationRepository->findAll(),
        ]);
    }
}
