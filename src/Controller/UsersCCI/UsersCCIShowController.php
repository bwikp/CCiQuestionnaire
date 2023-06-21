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
class UsersCCIShowController extends AbstractController
{
    #[Route('/{id}', name: 'app_users_c_c_i_show', methods: ['GET'])]
    public function show(UsersCCI $usersCCI): Response
    {
        return $this->render('users_cci/show.html.twig', [
            'users_c_c_i' => $usersCCI,
        ]);
    }
}
