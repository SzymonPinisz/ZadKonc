<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\ColorPropertyInterface;

interface ProductInterface{

    public function getColor(): ?ColorPropertyInterface;
    public function setColor(ColorPropertyInterface $color): void;
    public function getColorProperty(): String;
}