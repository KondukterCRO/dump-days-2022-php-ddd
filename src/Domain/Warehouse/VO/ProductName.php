<?php

declare(strict_types=1);

namespace App\Domain\Warehouse\VO;

use App\Domain\Warehouse\Exception\ProductNameMustBeAtLeastThreeCharactersLongException;
use Assert\Assertion;
use Assert\AssertionFailedException;

final class ProductName
{
    public function __construct(private string $name)
    {
        try {
            Assertion::minLength($this->name, 3);
        } catch (AssertionFailedException) {
            throw new ProductNameMustBeAtLeastThreeCharactersLongException();
        }
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
