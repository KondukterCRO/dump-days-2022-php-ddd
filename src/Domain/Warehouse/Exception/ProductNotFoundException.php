<?php

declare(strict_types=1);

namespace App\Domain\Warehouse\Exception;

use App\Domain\Common\Exception\EntityNotFoundException;
use App\Domain\Warehouse\Product;

final class ProductNotFoundException extends EntityNotFoundException
{
    public static function getClassName(): string
    {
        return Product::class;
    }
}
