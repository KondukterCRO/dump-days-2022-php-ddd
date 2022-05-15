<?php

declare(strict_types=1);

namespace App\Infrastructure\Driving\Common\v1\Model\Warehouse;

use Undabot\SymfonyJsonApi\Model\ApiModel;
use Undabot\SymfonyJsonApi\Model\Resource\Annotation\Attribute;
use Undabot\SymfonyJsonApi\Service\Resource\Validation\Constraint\ResourceType;

/**
 * @ResourceType(type="products")
 * @psalm-immutable
 */
final class ProductWriteModel implements ApiModel
{
    public function __construct(
        public string $id,
        /** @Attribute */
        public string $name,
        /** @Attribute */
        public string $color,
    ) {
    }
}
