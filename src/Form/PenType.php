<?php

namespace App\Form;

use App\Entity\Brand;
use App\Entity\Color;
use App\Entity\Material;
use App\Entity\Pen;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('price')
            ->add('description')
            ->add('ref')
            ->add('type', EntityType::class, [
                'class' => Type::class,
'choice_label' => 'id',
            ])
            ->add('material', EntityType::class, [
                'class' => Material::class,
'choice_label' => 'id',
            ])
            ->add('colors', EntityType::class, [
                'class' => Color::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('brand', EntityType::class, [
                'class' => Brand::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pen::class,
        ]);
    }
}
