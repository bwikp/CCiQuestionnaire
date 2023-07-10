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
class ResultatCreationController extends AbstractController
{

    #[Route('/new', name: 'app_resultat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ResultatRepository $resultatRepository): Response
    {
// $entity->getRelatedEntities();
        $resultat = new Resultat();
        $form = $this->createForm(Resultat1Type::class, $resultat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resultatRepository->save($resultat, true);

            return $this->redirectToRoute('app_resultat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('resultat/new.html.twig', [
            'resultat' => $resultat,
            'form' => $form,
        ]);
    }
}
