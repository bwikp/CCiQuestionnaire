<?php

namespace App\Controller\QuestionRemplir;

use App\Entity\QuestionRemplir;
use App\Form\QuestionRemplirType;
use App\Repository\QuestionRemplirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/question/remplir')]
class QuestionRemplirShowController extends AbstractController
{
   

    #[Route('/{id}', name: 'app_question_remplir_show', methods: ['GET'])]
    public function show(QuestionRemplir $questionRemplir): Response
    {
        return $this->render('question_remplir/show.html.twig', [
            'question_remplir' => $questionRemplir,
        ]);
    }

   
}
