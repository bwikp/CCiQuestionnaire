<?php

namespace App\Form;

use App\Entity\QuestionQcm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionQcmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('choix1')
            ->add('detail_choix1')
            ->add('choix2')
            ->add('detail_choix2')
            ->add('choix3')
            ->add('detail_choix3')
            ->add('choix4')
            ->add('detail_choix4')
            ->add('reponse')
<<<<<<< HEAD
            ->add('type')
        ;
=======
            ->add('type');
>>>>>>> ea86293ecc74fa983a02b63caad6d1ce0745f27b
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => QuestionQcm::class,
        ]);
    }
}
