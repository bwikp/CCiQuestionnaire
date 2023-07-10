<?php

namespace App\Controller\Resultat;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormTypeInterface;
use App\Data\SearchData;
use App\Entity\Dossier;
use App\Entity\Resultat;
use App\Form\Resultat1Type;
use App\FormFiltre\SearchForm;
use App\Repository\DossierRepository;
use App\Repository\PromoFormationRepository;
use App\Repository\PromotionRepository;
use App\Repository\ResultatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/resultat')]
class ResultatShowController extends AbstractController
{

    #[Route('/{id}', name: 'app_resultat_show', methods: ['GET'])]
    public function show(Resultat $resultat): Response
    {
        return $this->render('resultat/show.html.twig', [
            'resultat' => $resultat,
        ]);
    }
}
