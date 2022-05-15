<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\DatabaseIdentifier\Doctrine;

use App\Domain\Common\Id;
use App\Domain\Warehouse\ProductId;

final class ProductIdType extends IdType
{
    public function getName(): string
    {
        return 'productId';
    }

    protected function getIdClass(): string
    {
        return ProductId::class;
    }

    protected function createIdFromString(string $value): Id
    {
        return ProductId::fromString($value);
    }

    protected function isValid(string $value): bool
    {
        return ProductId::isValid($value);
    }
}
