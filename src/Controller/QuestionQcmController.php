<?php

namespace App\Controller;

use App\Entity\QuestionQcm;
use App\Form\QuestionQcmType;
use App\Repository\QuestionQcmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/question/qcm')]
class QuestionQcmController extends AbstractController
{
    #[Route('/', name: 'app_question_qcm_index', methods: ['GET'])]
    public function index(QuestionQcmRepository $questionQcmRepository): Response
    {
        return $this->render('question_qcm/index.html.twig', [
            'question_qcms' => $questionQcmRepository->findAll(),
        ]);
    }


   // use Symfony\Component\HttpFoundation\File\UploadedFile;
   // use Symfony\Component\HttpFoundation\File\Exception\FileException;
    // public function new(Request $request, SluggerInterface $slugger): Response
        // {
        //     $questionQcm = new QuestionQcm();
        //     $form = $this->createForm(QuestionQcmType::class, $questionQcm);
        //     $form->handleRequest($request);
    
        //     if ($form->isSubmitted() && $form->isValid()) {
        //         /** @var UploadedFile $imageFile */
        //         $imageFile = $form->get('image')->getData();
    
        //         // this condition is needed because the 'brochure' field is not required
        //         // so the PDF file must be processed only when a file is uploaded
        //         if ($imageFile) {
        //             $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
        //             // this is needed to safely include the file name as part of the URL
        //             $safeFilename = $slugger->slug($originalFilename);
        //             $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();
    
        //             // Move the file to the directory where brochures are stored
        //             try {
        //                 $imageFile->move(
        //                     $this->getParameter('images_directory'),
        //                     $newFilename
        //                 );
        //             } catch (FileException $e) {
        //                 // ... handle exception if something happens during file upload
        //             }
    
        //             // updates the 'brochureFilename' property to store the PDF file name
        //             // instead of its contents
        //             $questionQcm->setImage($newFilename);
        //         }
    
        //         // ... persist the $product variable or any other work
    
        //         return $this->redirectToRoute('app_product_list');
        //     }
    
        //     return $this->render('question_qcm/new.html.twig', [
        //         'form' => $form,
        //     ]);
        // }
    



    #[Route('/new', name: 'app_question_qcm_new', methods: ['GET', 'POST'])]
    public function new(Request $request, QuestionQcmRepository $questionQcmRepository): Response
    {
        $questionQcm = new QuestionQcm();
        $form = $this->createForm(QuestionQcmType::class, $questionQcm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionQcmRepository->save($questionQcm, true);

            return $this->redirectToRoute('app_question_qcm_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('question_qcm/new.html.twig', [
            'question_qcm' => $questionQcm,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_question_qcm_show', methods: ['GET'])]
    public function show(QuestionQcm $questionQcm): Response
    {
        return $this->render('question_qcm/show.html.twig', [
            'question_qcm' => $questionQcm,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_question_qcm_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, QuestionQcm $questionQcm, QuestionQcmRepository $questionQcmRepository): Response
    {
        $form = $this->createForm(QuestionQcmType::class, $questionQcm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionQcmRepository->save($questionQcm, true);

            return $this->redirectToRoute('app_question_qcm_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('question_qcm/edit.html.twig', [
            'question_qcm' => $questionQcm,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_question_qcm_delete', methods: ['POST'])]
    public function delete(Request $request, QuestionQcm $questionQcm, QuestionQcmRepository $questionQcmRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$questionQcm->getId(), $request->request->get('_token'))) {
            $questionQcmRepository->remove($questionQcm, true);
        }

        return $this->redirectToRoute('app_question_qcm_index', [], Response::HTTP_SEE_OTHER);
    }
}
