<?php

namespace App\Form;

use App\Entity\QuestionRemplir;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionRemplirType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('detail')
            ->add('detail_1')
            ->add('reponse1')
            ->add('detail2')
            ->add('reponse2')
            ->add('detail3')
            ->add('reponse3')
            ->add('detail4')
            ->add('reponse4')
            ->add('note')
            ->add('type')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => QuestionRemplir::class,
        ]);
    }
}
