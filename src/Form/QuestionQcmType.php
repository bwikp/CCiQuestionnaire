<?php

namespace App\Form;

use App\Entity\QuestionQcm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Validator\Constraints\File;
class QuestionQcmType extends AbstractType

{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
               ->add('imageFile',  FileType::class )
           

            ->add('detail')
            ->add('choix1')
            ->add('detail_choix1')
            ->add('choix2')
            ->add('detail_choix2')
            ->add('choix3')
            ->add('detail_choix3')
            ->add('choix4')
            ->add('detail_choix4')
            ->add('reponse')
            ->add('note')
            ->add('type')
        ;
        
    }
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => QuestionQcm::class,
        ]);
    }
}
