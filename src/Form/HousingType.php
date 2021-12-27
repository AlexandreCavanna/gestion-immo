<?php

namespace App\Form;

use App\Entity\Building;
use App\Entity\Housing;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HousingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lot')
            ->add('type')
            ->add('building', EntityType::class, [
                'class' => Building::class,
                'choice_label' => function (Building $building) {
                    return sprintf('Adresse: %s', $building->getAddress());
                },
                'placeholder' => 'Choisir une propriété',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Housing::class,
        ]);
    }
}
