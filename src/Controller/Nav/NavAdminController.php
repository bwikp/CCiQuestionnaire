<?php

namespace App\Controller\Nav;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavAdminController extends AbstractController
{
    #[Route('/', name: 'app_nav_admin')] 
    public function index(): Response
    {
        return $this->render('nav/index.html.twig', [
            'controller_name' => 'NavAdminController',
        ]);
    }
}
