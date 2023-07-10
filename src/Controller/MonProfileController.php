<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\UsersCCI;
use App\Entity\Candidat;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_mon_profile')]
    public function index(UsersCCI $usersCCI,Candidat $candidat): Response
    {
        return $this->render('mon_profile/index.html.twig', [
            'user' => $usersCCI,
            'candidat' => $candidat
        ]);
    }
}
