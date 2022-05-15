<?php

declare(strict_types=1);

namespace App\Application\Repository\Warehouse;

use App\Domain\Warehouse\Product;

interface ProductWriteRepository
{
    public function save(Product $product): void;
}
