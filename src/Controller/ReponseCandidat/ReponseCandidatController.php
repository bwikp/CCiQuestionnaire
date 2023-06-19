<?php

namespace App\Controller\Dossier;

use App\Entity\ReponseCandidat;
use App\Form\ReponseCandidatType;
use App\Repository\ReponseCandidatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reponse/candidat')]
class ReponseCandidatController extends AbstractController
{
    #[Route('/', name: 'app_reponse_candidat_index', methods: ['GET'])]
    public function index(ReponseCandidatRepository $reponseCandidatRepository): Response
        {
            return $this->render('reponse_candidat/index.html.twig', [
                'reponse_candidats' => $reponseCandidatRepository->findAll(),
            ]);
        }

}
