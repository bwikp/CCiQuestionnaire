<?php

namespace App\Controller\UsersCCI;

use App\Entity\UsersCCI;
use App\Form\UsersCCIType;
use App\Repository\UsersCCIRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\RegistrationFormType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/users/cci')]
class UsersCCICreationController extends AbstractController
{

    #[Route('/new', name: 'app_users_c_c_i_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UsersCCIRepository $usersCCIRepository,UserPasswordHasherInterface $userPasswordHasher,EntityManagerInterface $entityManager): Response
    {
        $user = new UsersCCI();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_users_c_c_i_index');
        }
        return $this->render('users_cci/new.html.twig', [
            'users_c_c_i' => $user,
            'form' => $form,
        ]);
    }
}
