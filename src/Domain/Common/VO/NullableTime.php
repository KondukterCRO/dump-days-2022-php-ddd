<?php

declare(strict_types=1);

namespace App\Domain\Common\VO;

use Assert\Assertion;

final class NullableTime
{
    public function __construct(private ?int $timestamp)
    {
        if (null !== $this->timestamp) {
            Assertion::maxLength((string) $this->timestamp, 10);
        }
    }

    public static function createEmpty(): self
    {
        return new self(null);
    }

    public static function fromClock(Clock $clock): self
    {
        return new self($clock->value());
    }

    public function value(): ?int
    {
        return $this->timestamp;
    }

    public function toClockOrNull(): ?Clock
    {
        if (null === $this->timestamp) {
            return null;
        }

        return new Clock($this->timestamp);
    }
}
