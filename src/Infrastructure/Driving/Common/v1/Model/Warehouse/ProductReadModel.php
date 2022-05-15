<?php

declare(strict_types=1);

namespace App\Infrastructure\Driving\Common\v1\Model\Warehouse;

use App\Domain\Warehouse\Product;
use Undabot\SymfonyJsonApi\Model\ApiModel;
use Undabot\SymfonyJsonApi\Model\Resource\Annotation\Attribute;
use Undabot\SymfonyJsonApi\Service\Resource\Validation\Constraint\ResourceType;

/**
 * @ResourceType(type="products")
 * @psalm-immutable
 */
final class ProductReadModel implements ApiModel
{
    public function __construct(
        public string $id,
        /** @Attribute */
        public string $name,
        /** @Attribute */
        public string $color,
    ) {
    }

    public static function fromEntity(Product $product): self
    {
        return new self(
            (string) $product->id(),
            (string) $product->name(),
            (string) $product->color(),
        );
    }
}
