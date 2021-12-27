<?php

namespace App\Form;

use App\Entity\Housing;
use App\Entity\Lodger;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LodgerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('phone')
            ->add('email')
            ->add('startDate')
            ->add('EndDate')
            ->add('housing', EntityType::class, [
                'class' => Housing::class,
                'choice_label' => function (Housing $housing) {
                    return sprintf(
                        'Propriété: %s | Numéro de lot: %s | Type: %s',
                        $housing->getBuilding()?->getAddress(),
                        $housing->getLot(),
                        $housing->getType()
                    );
                },
                'placeholder' => 'Choisir un logement pour le nouveau locataire',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lodger::class,
        ]);
    }
}
