<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\Persistence\Doctrine\Repository;

use App\Application\Repository\Warehouse\ProductReadRepository;
use App\Domain\Warehouse\Exception\ProductNotFoundException;
use App\Domain\Warehouse\Product;
use App\Domain\Warehouse\ProductId;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Ulid;

/** @extends \Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository<Product> */
final class DoctrineProductReadRepository extends ServiceEntityRepository implements ProductReadRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function get(ProductId $id): Product
    {
        /** @var null|Product $product */
        $product = $this->find((string) $id);

        if (null === $product) {
            throw ProductNotFoundException::withId((string) $id);
        }

        return $product;
    }

    public function nextId(): ProductId
    {
        return ProductId::fromString((string) new Ulid());
    }
}
