<?php

declare(strict_types=1);

namespace App\Domain\Common\VO;

use Assert\Assertion;

final class Clock
{
    public function __construct(private int $timestamp)
    {
        Assertion::maxLength((string) $this->timestamp, 10);
    }

    public function __toString(): string
    {
        return (string) $this->timestamp;
    }

    public function value(): int
    {
        return $this->timestamp;
    }
}
