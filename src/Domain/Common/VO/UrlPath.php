<?php

declare(strict_types=1);

namespace App\Domain\Common\VO;

use Assert\Assertion;

final class UrlPath
{
    public function __construct(private string $urlPath)
    {
        Assertion::startsWith($urlPath, '/');
        Assertion::minLength($urlPath, 2);
    }

    public function __toString(): string
    {
        return $this->urlPath;
    }
}
