<?php

namespace App\Form;

use App\Entity\DerniereFormation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DerniereFormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('annee_scolaire')
            ->add('classe_frequentee')
            ->add('diplome_obtenu_ou_en_cours')
            ->add('nom_localite_etablissement')
            ->add('candidat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DerniereFormation::class,
        ]);
    }
}
