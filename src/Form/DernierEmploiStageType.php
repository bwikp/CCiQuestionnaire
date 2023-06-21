<?php

namespace App\Form;

use App\Entity\DernierEmploiStage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DernierEmploiStageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('annee')
            ->add('duree')
            ->add('nom_entreprise')
            ->add('ville')
            ->add('poste_occupe')
            ->add('candidat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DernierEmploiStage::class,
        ]);
    }
}
