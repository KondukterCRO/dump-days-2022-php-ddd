<?php

declare(strict_types=1);

namespace App\Domain\Warehouse\Exception;

use App\Domain\Common\Exception\TranslatableException;

final class ProductNameMustBeAtLeastThreeCharactersLongException extends TranslatableException
{
    public function __construct()
    {
        parent::__construct('errors.product.product_name_to_short', []);
    }
}
