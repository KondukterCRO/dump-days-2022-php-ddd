<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\Persistence\Doctrine\Repository;

use App\Application\Repository\Warehouse\ProductWriteRepository;
use App\Domain\Warehouse\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/** @extends \Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository<Product> */
final class DoctrineProductWriteRepository extends ServiceEntityRepository implements ProductWriteRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Product $product): void
    {
        $this->_em->persist($product);
        $this->_em->flush();
    }
}
