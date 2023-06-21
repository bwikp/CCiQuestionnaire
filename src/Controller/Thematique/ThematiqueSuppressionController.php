<?php

namespace App\Controller\Thematique;

use App\Entity\Thematique;
use App\Form\ThematiqueType;
use App\Repository\ThematiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/thematique')]
class ThematiqueSuppressionController extends AbstractController
{
    #[Route('/{id}', name: 'app_thematique_delete', methods: ['POST'])]
    public function delete(Request $request, Thematique $thematique, ThematiqueRepository $thematiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$thematique->getId(), $request->request->get('_token'))) {
            $thematiqueRepository->remove($thematique, true);
        }

        return $this->redirectToRoute('app_thematique_index', [], Response::HTTP_SEE_OTHER);
    }
}
