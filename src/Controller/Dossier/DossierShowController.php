<?php

namespace App\Controller\Dossier;

use App\Entity\Dossier;
use App\Form\Dossier2Type;
use App\Repository\DossierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dossier')]
class DossierShowController extends AbstractController
{
#[Route('/{id}', name: 'app_dossier_show', methods: ['GET'])]
    public function show(Dossier $dossier): Response
    {
        return $this->render('dossier/show.html.twig', [
            'dossier' => $dossier,
        ]);
    }
}