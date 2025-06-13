<?php

declare(strict_types=1);

namespace LMSBridge\Catalog\Domain;

readonly final class Course
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $description,
        public Duration $duration,
    ) {
    }
}
