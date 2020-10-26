<?php

namespace App\Form;

use App\Entity\Deal;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DealType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name',TextType::class, ['label' => 'Nom du Deal'])
            ->add('description', TextareaType::class, ['label' => 'Description'])
            ->add('price', IntegerType::class, ['label' => 'Prix'])
            ->add('categories')
            ->add('Envoyer', SubmitType::class, ['label' => 'Envoyer', 'attr'=>['class' => 'btn btn-secondary']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Deal::class,
        ]);
    }
}
