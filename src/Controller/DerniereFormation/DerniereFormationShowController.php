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
class DerniereFormationShowController extends AbstractController
{
   

    #[Route('/{id}', name: 'app_derniere_formation_show', methods: ['GET'])]
    public function show(DerniereFormation $derniereFormation): Response
    {
        return $this->render('derniere_formation/show.html.twig', [
            'derniere_formation' => $derniereFormation,
        ]);
    }


}
