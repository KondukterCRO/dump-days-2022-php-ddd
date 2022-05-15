<?php

declare(strict_types=1);

namespace App\Domain\Warehouse;

use App\Domain\Warehouse\VO\ProductColor;
use App\Domain\Warehouse\VO\ProductName;
use App\Domain\Warehouse\VO\ProductPrice;

class Product
{
    public function __construct(
        private ProductId $id,
        private ProductName $name,
        private ProductColor $color,
        private ProductPrice $price,
    ) {
    }

    public function id(): ProductId
    {
        return $this->id;
    }

    public function name(): ProductName
    {
        return $this->name;
    }

    public function color(): ProductColor
    {
        return $this->color;
    }
}
