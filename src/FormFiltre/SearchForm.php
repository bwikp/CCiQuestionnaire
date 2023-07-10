<?php

namespace App\FormFiltre;

use App\Entity\Promotion;
use App\Data\SearchData;
use App\Entity\Formation;
use App\Repository\PromotionRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchForm extends AbstractType
{

    // public function getPromotion(PromotionRepository $promotionRepository)
    // {
    //     $promos = $promotionRepository->findAll();
    // }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ]
            ])
            ->add('promos', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Promotion::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('formation', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Formation::class,
                'expanded' => true,
                'multiple' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}