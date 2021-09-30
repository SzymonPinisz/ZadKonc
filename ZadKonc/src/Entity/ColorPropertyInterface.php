<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ColorPropertyInterface extends ResourceInterface {
    public function getColor(): ?string;
    public function setColor(?string $color): void;
    public function getProducts(): ?Collection;
}