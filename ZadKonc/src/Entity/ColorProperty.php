<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections;
use Doctrine\Common\Collections\Collection;
use phpDocumentor\Reflection\Types\Integer;
class ColorProperty implements ColorPropertyInterface{

    /**
     * @var int|null
    */
    private $id;

    /**
     * @var string
     */
    private $color;

    /**
     * @var Collection
     */
    private $products;

    public function getId(): ?int{
        return $this->id;
    }public function setId(?int $id): void{
        $this-> id = $id;
    }
 
    public function getColor(): ?string{
        if($this -> color){
            return $this->color;
        }else{
            return "";
        }
    }public function setColor(?string $color): void{
        $this-> color = $color;
    }

    public function getProducts(): ?Collection{
        return $this->products;
    }
}