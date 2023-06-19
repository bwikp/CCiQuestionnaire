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
class ReponseCandidatShowController extends AbstractController
{
    

    #[Route('/{id}', name: 'app_reponse_candidat_show', methods: ['GET'])]
    public function show(ReponseCandidat $reponseCandidat): Response
        {
            return $this->render('reponse_candidat/show.html.twig', [
                'reponse_candidat' => $reponseCandidat,
            ]);
        }

}
