<?php

namespace App\Controller\Security;

use App\Entity\UsersCCI;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Candidat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CandidatType;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new UsersCCI();
        // $candidat = new Candidat();
        // $candidatForm = $this->createForm(CandidatType::class, $candidat);
        $form = $this->createForm(RegistrationFormType::class, $user);
        // $candidatForm->handleRequest($request);
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

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            // 'form' => $candidatForm->createView()
        ]);
    }
}
