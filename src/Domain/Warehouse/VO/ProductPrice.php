<?php

declare(strict_types=1);

namespace App\Domain\Warehouse\VO;

use Assert\Assertion;

final class ProductPrice
{
    public function __construct(private int $price)
    {
        Assertion::greaterThan($this->price, 0);
    }

    public function toInteger(): int
    {
        return $this->price;
    }

    public function toFloat(): float
    {
        return (float) $this->price;
    }
}
