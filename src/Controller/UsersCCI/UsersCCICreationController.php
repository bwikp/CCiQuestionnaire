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
class UsersCCICreationController extends AbstractController
{

    #[Route('/new', name: 'app_users_c_c_i_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UsersCCIRepository $usersCCIRepository): Response
    {
        $usersCCI = new UsersCCI();
        $form = $this->createForm(UsersCCI1Type::class, $usersCCI);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $usersCCIRepository->save($usersCCI, true);

            return $this->redirectToRoute('app_users_c_c_i_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('users_cci/new.html.twig', [
            'users_c_c_i' => $usersCCI,
            'form' => $form,
        ]);
    }
}
