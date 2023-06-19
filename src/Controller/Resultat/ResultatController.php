<?php

namespace App\Controller\Resultat;

use App\Entity\Resultat;
use App\Form\ResultatType;
use App\Repository\ResultatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/resultat')]
class ResultatController extends AbstractController
{
    #[Route('/', name: 'app_resultat_index', methods: ['GET'])]
    public function index(ResultatRepository $resultatRepository): Response
        {
            return $this->render('resultat/index.html.twig', [
                'resultats' => $resultatRepository->findAll(),
            ]);
        }

}
