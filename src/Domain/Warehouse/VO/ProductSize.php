<?php

declare(strict_types=1);

namespace App\Domain\Warehouse\VO;

use Assert\Assertion;

final class ProductSize
{
    public function __construct(private string $size)
    {
        Assertion::notEmpty($this->size);
    }

    public function __toString(): string
    {
        return $this->size;
    }
}
