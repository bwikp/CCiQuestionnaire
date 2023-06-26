<?php

namespace App\Controller\Type;

use App\Entity\Type;
use App\Form\TypeType;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type')]
class TypeSuppressionController extends AbstractController
{
    #[Route('/{id}', name: 'app_type_delete', methods: ['POST'])]
    public function delete(Request $request, Type $type, TypeRepository $typeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $type->getId(), $request->request->get('_token'))) {
            $typeRepository->remove($type, true);
        }

        return $this->redirectToRoute('app_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
