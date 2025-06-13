<?php

declare(strict_types=1);

namespace LMSBridge\Catalog\Domain;

readonly final class Duration
{
    public function __construct(
        public int $seconds,
    ) {
    }

    public static function fromMinutes(int $minutes): self
    {
        return new self($minutes * 60);
    }

    public function toMinutes(): float
    {
        return $this->seconds / 60;
    }

    public function toRoundedMinutes(): int
    {
        return (int) ceil($this->toMinutes());
    }

    public function toHuman(): string
    {
        return gmdate("H:i:s", $this->seconds);
    }
}
