<?php

declare(strict_types=1);

namespace App\Persistence\Enum;

enum ActiveSorting: int
{
    case ById = 0;
    case ByName = 1;
    case ByAddress = 2;
    case ByCreationTimestamp = 3;
    case ByModificationTimestamp = 4;

    public static function fromString(string $value): self
    {
        return match ($value) {
            'id' => self::ById,
            'name' => self::ByName,
            'address' => self::ByAddress,
            'creationTimestamp' => self::ByCreationTimestamp,
            'modificationTimestamp' => self::ByModificationTimestamp,
        };
    }
}
