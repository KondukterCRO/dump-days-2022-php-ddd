<?php

declare(strict_types=1);

namespace App\Domain\Common\VO;

use Assert\Assertion;

final class Url
{
    public function __construct(private string $url)
    {
        Assertion::url($url);
    }

    public function __toString(): string
    {
        return $this->url;
    }
}
