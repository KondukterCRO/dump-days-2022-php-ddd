<?php

declare(strict_types=1);

namespace App\Infrastructure\Driving\Common\v1\ApiResponder;

use App\Domain\Warehouse\Product;
use App\Infrastructure\Driving\Common\v1\Model\Warehouse\ProductReadModel;
use Undabot\SymfonyJsonApi\Http\Service\Responder\AbstractResponder;

final class ResourceResponder extends AbstractResponder
{
    /** {@inheritdoc} */
    protected function getMap(): array
    {
        return [
            Product::class => [ProductReadModel::class, 'fromEntity'],
        ];
    }
}
