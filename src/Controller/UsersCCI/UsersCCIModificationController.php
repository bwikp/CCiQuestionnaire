<?php

namespace App\Controller\UsersCCI;

use App\Entity\UsersCCI;
use App\Form\UsersCCI1Type;
use App\Repository\UsersCCIRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/users/c/c/i')]
class UsersCCIModificationController extends AbstractController
{

    #[Route('/{id}/edit', name: 'app_users_c_c_i_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, UsersCCI $usersCCI, UsersCCIRepository $usersCCIRepository): Response
    {
        $form = $this->createForm(UsersCCI1Type::class, $usersCCI);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $usersCCIRepository->save($usersCCI, true);

            return $this->redirectToRoute('app_users_c_c_i_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('users_cci/edit.html.twig', [
            'users_c_c_i' => $usersCCI,
            'form' => $form,
        ]);
    }
}
