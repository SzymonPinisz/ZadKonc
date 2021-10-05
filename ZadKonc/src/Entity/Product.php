<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\ColorPropertyInterface;
use App\Entity\ProductInterface;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Product\Model\ProductTranslationInterface;

class Product extends BaseProduct implements ProductInterface{

    /**
     * @var ColorPropertyInterface
     */
    private $color;

    public function getColor(): ?ColorPropertyInterface {
        return $this -> color;
    }public function setColor(ColorPropertyInterface $color): void {
        $this -> color = $color;
    }

    //This function is for twig purposes
    public function getColorProperty(): String {
        if($this -> color){
            return $this -> color -> getColor();
        }else{
            return "";
        }
    }
}