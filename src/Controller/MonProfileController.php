<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\UsersCCI;
use App\Entity\Candidat;
use App\Form\UserType;
use App\Repository\UsersCCIRepository;
use App\Repository\CandidatRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_mon_profile', methods:['GET'])]
    public function index(): Response
    {
        $user = $this->getUser();
        return $this->render('mon_profile/index.html.twig', [
            'user'=> $user
        ]);
    }

    #[Route('/profile/{id}/edit', name: 'app_profile_edit', methods:['GET','POST'] )]
    public function edit(Request $request, UsersCCIRepository $usersCCIRepository): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $usersCCIRepository->save($user, true);

            return $this->redirectToRoute('app_mon_profile', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('mon_profile/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
}
