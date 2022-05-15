<?php

declare(strict_types=1);

namespace App\Domain\Warehouse\VO;

use Assert\Assertion;

final class ProductColor
{
    public function __construct(private string $color)
    {
        Assertion::notEmpty($this->color);
    }

    public function __toString(): string
    {
        return $this->color;
    }
}
