<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections;
use Doctrine\Common\Collections\Collection;
use phpDocumentor\Reflection\Types\Integer;

    /**
     * @ORM\Entity
     * @ORM\Table(name="app_color")
     * @ApiResource
     */

class ColorProperty implements ColorPropertyInterface{

    /**
     * @var int|null
     * 
     * @ORM\Column(type="integer")
     * @ORM\Id
     * 
    */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     *
     */
    private $color;

    /**
     * @var Collection
     * 
     * @ORM\OneToMany(targetEntity="App\Entity\Product\Product", mappedBy="colors")
     */
    private $products;

    public function getId(): ?int{
        return $this->id;
    }public function setId(?int $id): void{
        $this-> id = $id;
    }
 
    public function getColor(): ?string{
        return $this->color;
    }public function setColor(?string $color): void{
        $this-> color = $color;
    }

    public function getProducts(): ?Collection{
        return $this->products;
    }/*public function setProducts(?Collection $products): void{
        $this-> products = $products;
    }*/
}