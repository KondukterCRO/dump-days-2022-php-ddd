<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\Persistence\Doctrine\Fixtures;

use App\Application\Repository\Warehouse\ProductReadRepository;
use App\Domain\Warehouse\Product;
use App\Domain\Warehouse\ProductId;
use App\Domain\Warehouse\VO\ProductColor;
use App\Domain\Warehouse\VO\ProductName;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

final class ProductFixture extends Fixture
{
    public const IDS = [
        '01FR7ZF9RTHKSVH9FB1BA846JV',
        '01FR7ZF738VHEFX6E3H41N6CWZ',
    ];

    public const PRODUCTS_TO_CREATE = 500;

    private Generator $faker;

    public function __construct(
        private ProductReadRepository $productReadRepository,
    ) {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < self::PRODUCTS_TO_CREATE; ++$i) {
            $product = new Product(
                true === \array_key_exists($i, self::IDS)
                    ? ProductId::fromString(self::IDS[$i])
                    : $this->productReadRepository->nextId(),
                new ProductName(str_repeat($this->faker->randomLetter(), random_int(4, 20))),
                new ProductColor($this->faker->colorName()),
            );
            $this->setReference(Product::class . $i, $product);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
