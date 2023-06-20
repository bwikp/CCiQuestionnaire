<?php

namespace App\Controller\UsersCCI;

use App\Entity\UsersCCI;
use App\Form\UsersCCI1Type;
use App\Repository\UsersCCIRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/users/cci')]
class UsersCCISuppressionController extends AbstractController
{
    #[Route('/{id}', name: 'app_users_c_c_i_delete', methods: ['POST'])]
    public function delete(Request $request, UsersCCI $usersCCI, UsersCCIRepository $usersCCIRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $usersCCI->getId(), $request->request->get('_token'))) {
            $usersCCIRepository->remove($usersCCI, true);
        }

        return $this->redirectToRoute('app_users_c_c_i_index', [], Response::HTTP_SEE_OTHER);
    }
}
