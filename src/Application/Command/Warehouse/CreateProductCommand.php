<?php

declare(strict_types=1);

namespace App\Application\Command\Warehouse;

use App\Application\Command\Command;
use App\Domain\Warehouse\ProductId;
use App\Domain\Warehouse\VO\ProductColor;
use App\Domain\Warehouse\VO\ProductName;

/** @psalm-immutable */
final class CreateProductCommand implements Command
{
    public function __construct(
        public ProductId $id,
        public ProductName $name,
        public ProductColor $color,
    ) {
    }
}
