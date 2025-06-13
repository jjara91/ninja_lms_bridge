<?php

declare(strict_types=1);

namespace App\Doctrine\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use LMSBridge\Catalog\Domain\Duration;

final class DurationType extends Type
{
    public const string NAME = 'duration';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getIntegerTypeDeclarationSQL($column);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?int
    {
        if ($value === null) {
            return null;
        }

        if (!$value instanceof Duration) {
            throw new \InvalidArgumentException('Expected Duration instance.');
        }

        return $value->seconds;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Duration
    {
        if ($value === null) {
            return null;
        }

        return new Duration((int)$value);
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true; // importante para Doctrine detectar el tipo en cache/schema
    }
}
