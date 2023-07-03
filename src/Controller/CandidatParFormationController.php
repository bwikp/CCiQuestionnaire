<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DossierRepository;

class CandidatParFormationController extends AbstractController
{
    #[Route('/candidat/par/formation', name: 'app_candidat_par_formation',methods:['GET'])]
    public function index(DossierRepository $dossierRepository): Response
    {
        $dossiers = $dossierRepository->findAll();

        return $this->render('candidat_par_formation/index.html.twig', [
            'dossiers' => $dossiers
        ]);
    }
}
