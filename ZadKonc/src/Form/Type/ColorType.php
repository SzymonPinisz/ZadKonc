<?php

declare(strict_types=1);

namespace App\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class ColorType extends AbstractResourceType{
    public function buildForm(FormBuilderInterface $builder, array $options){ 
        $builder
            ->add('Color', TextType::class, ['label' => 'app.ui.colorproperty']);
    }
}