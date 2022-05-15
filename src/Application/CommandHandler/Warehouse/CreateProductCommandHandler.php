<?php

declare(strict_types=1);

namespace App\Application\CommandHandler\Warehouse;

use App\Application\Command\Warehouse\CreateProductCommand;
use App\Application\Repository\Warehouse\ProductWriteRepository;
use App\Domain\Warehouse\Product;

final class CreateProductCommandHandler
{
    public function __construct(private ProductWriteRepository $productWriteRepository)
    {
    }

    public function __invoke(CreateProductCommand $command): void
    {
        $this->productWriteRepository->save(
            new Product($command->id, $command->name, $command->color)
        );
    }
}
