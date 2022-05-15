<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\ParamConverter;

use App\Domain\Warehouse\ProductId;

final class ProductIdConverter extends IdConverter
{
    protected function idClass(): string
    {
        return ProductId::class;
    }
}
