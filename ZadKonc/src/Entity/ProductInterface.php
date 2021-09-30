<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\ColorPropertyInterface;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Core\Model\ProductInterface as ModelProductInterface;
use Sylius\Component\Product\Model\ProductTranslationInterface;

interface ProductInterface{

    public function getColor(): ?ColorPropertyInterface;
    public function setColor(ColorPropertyInterface $color): void;
    public function getColorProperty(): String;
}