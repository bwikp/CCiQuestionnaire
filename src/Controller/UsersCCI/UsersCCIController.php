<?php

namespace App\Controller\UsersCCI;

use App\Entity\UsersCCI;
use App\Repository\UsersCCIRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/users/cci')]
class UsersCCIController extends AbstractController
{
    #[Route('/', name: 'app_users_c_c_i_index', methods: ['GET'])]
    public function index(UsersCCIRepository $usersCCIRepository): Response
    {
        return $this->render('users_cci/index.html.twig', [
            'users_c_c_is' => $usersCCIRepository->findAll(),
        ]);
    }


    #[Route('/{id}', name: 'app_users_c_c_i_delete', methods: ['POST'])]
    public function delete(Request $request, UsersCCI $usersCCI, UsersCCIRepository $usersCCIRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $usersCCI->getId(), $request->request->get('_token'))) {
            $usersCCIRepository->remove($usersCCI, true);
        }

        return $this->redirectToRoute('app_users_c_c_i_index', [], Response::HTTP_SEE_OTHER);
    }
}
