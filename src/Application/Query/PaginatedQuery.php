<?php

declare(strict_types=1);

namespace App\Application\Query;

/**
 * @psalm-immutable
 */
abstract class PaginatedQuery implements Query
{
    public function __construct(public ?int $offset, public ?int $size)
    {
    }
}
