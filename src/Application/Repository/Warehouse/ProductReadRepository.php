<?php

declare(strict_types=1);

namespace App\Application\Repository\Warehouse;

use App\Domain\Warehouse\Exception\ProductNotFoundException;
use App\Domain\Warehouse\Product;
use App\Domain\Warehouse\ProductId;

interface ProductReadRepository
{
    /** @throws ProductNotFoundException */
    public function get(ProductId $id): Product;

    public function nextId(): ProductId;
}
