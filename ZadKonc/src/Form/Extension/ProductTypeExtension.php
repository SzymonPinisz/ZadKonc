<?php

declare(strict_types=1);

namespace App\Form\Extension;

use App\Entity\ColorProperty;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductTypeExtension extends AbstractTypeExtension{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
        ->add('color', EntityType::class,
            [
                'class' => ColorProperty::class,
                'choice_label' => 'color',
                'label' => 'app.ui.colorproperty',
            ])
        ;
    }

    public static function getExtendedTypes(): iterable{
        return [ProductType::class];
    }
}