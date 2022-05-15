<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\Persistence\Redis\Repository;

use App\Application\Repository\Warehouse\ProductReadRepository;
use App\Domain\Warehouse\Product;
use App\Domain\Warehouse\ProductId;
use App\Infrastructure\Driven\Persistence\Doctrine\Repository\DoctrineProductReadRepository;
use Symfony\Contracts\Cache\CacheInterface;

final class RedisProductReadRepository implements ProductReadRepository
{
    public function __construct(
        private CacheInterface $cache,
        private DoctrineProductReadRepository $doctrineProductReadRepository,
    ) {
    }

    public function get(ProductId $id): Product
    {
        $product = $this->cache->get((string) $id, function () use ($id): Product {
            return $this->doctrineProductReadRepository->get($id);
        });

        if (false === ($product instanceof Product)) {
            return $this->doctrineProductReadRepository->get($id);
        }

        return $product;
    }

    public function nextId(): ProductId
    {
        return $this->doctrineProductReadRepository->nextId();
    }
}
