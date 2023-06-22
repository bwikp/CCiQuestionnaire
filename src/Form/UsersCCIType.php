<?php

namespace App\Form;

use App\Entity\UsersCCI;
use Symfony\Component\Form\AbstractType;
use App\Repository\UsersCCIRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersCCIType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $roles): void
    {
        $builder
            ->add('email')
            ->add('roles',ChoiceType::class,[
                'required' => true,
                'multiple' => true,
                'expanded' => true,
                'choices' => [
                    'ADMIN' => 'ROLE_ADMIN'
                ]
            ])
            ->add('password')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UsersCCI::class,
        ]);
    }
}
