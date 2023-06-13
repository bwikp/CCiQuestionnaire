<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavAdminController extends AbstractController
{
    #[Route('/admin', name: 'app_nav_admin')]
    public function index(): Response
    {
        return $this->render('nav_admin/index.html.twig', [
            'controller_name' => 'NavAdminController',
        ]);
    }
}
