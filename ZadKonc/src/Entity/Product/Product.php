<?php

declare(strict_types=1);

namespace App\Entity\Product;

use App\Entity\ColorPropertyInterface;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Product\Model\ProductTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product")
 */
class Product extends BaseProduct{

    /**
     * @var ColorPropertyInterface
     * 
     * @ORM\ManyToOne(targetEntity="App\Entity\ColorProperty", inversedBy="colors")
     * @ORM\JoinColumn(name="colorproperty_id", referencedColumnName="id")
     */
    private $color;

    protected function createTranslation(): ProductTranslationInterface
    {
        return new ProductTranslation();
    }

    public function getColor(): ?ColorPropertyInterface {
        return $this -> color;
    }public function setColor(ColorPropertyInterface $color): void {
        $this -> color = $color;
    }

    //Thhis function is for twig purposes
    public function getColorProperty(): String {
        if($this -> color){
            return $this -> color -> getColor();
        }else{
            return "";
        }
    }
}
