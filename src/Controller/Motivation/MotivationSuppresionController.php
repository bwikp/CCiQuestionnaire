<?php

namespace App\Controller\Motivation;

use App\Entity\Motivation;
use App\Form\MotivationType;
use App\Repository\MotivationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/motivation')]
class MotivationSuppressionController extends AbstractController
{
    
    #[Route('/{id}', name: 'app_motivation_delete', methods: ['POST'])]
    public function delete(Request $request, Motivation $motivation, MotivationRepository $motivationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$motivation->getId(), $request->request->get('_token'))) {
            $motivationRepository->remove($motivation, true);
        }

        return $this->redirectToRoute('app_motivation_index', [], Response::HTTP_SEE_OTHER);
    }
}
