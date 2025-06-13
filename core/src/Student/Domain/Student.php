<?php

declare(strict_types=1);

namespace LMSBridge\Student\Domain;

readonly final class Student
{
    public function __construct(
        public ?int $id,
        public string $name,
    ) {
    }
}
