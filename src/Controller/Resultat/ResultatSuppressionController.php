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
class ResultatSuppressionController extends AbstractController
{

    #[Route('/{id}', name: 'app_resultat_delete', methods: ['POST'])]
    public function delete(Request $request, Resultat $resultat, ResultatRepository $resultatRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $resultat->getId(), $request->request->get('_token'))) {
            $resultatRepository->remove($resultat, true);
        }

        return $this->redirectToRoute('app_resultat_index', [], Response::HTTP_SEE_OTHER);
    }
}
