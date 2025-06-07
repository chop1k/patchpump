<?php

declare(strict_types=1);

namespace App\Domain\Inventory;

enum ActiveType: int
{
    case BusinessProcess = 0;
    case InformationSystem = 1;
    case TechnicalDevice = 2;
    case Software = 3;
    case InformationStorage = 4;

    public function toString(): string
    {
        return match ($this) {
            self::BusinessProcess => 'business-process',
            self::InformationSystem => 'information-system',
            self::TechnicalDevice => 'technical-device',
            self::Software => 'software',
            self::InformationStorage => 'information-storage',
            default => throw new \LogicException('Unknown active type.'),
        };
    }

    public static function fromString(string $value): self
    {
        match ($value) {
            'business-process' => self::BusinessProcess,
            'information-system' => self::InformationSystem,
            'technical-device' => self::TechnicalDevice,
            'software' => self::Software,
            'information-storage' => self::InformationStorage,
            default => throw new \InvalidArgumentException('Unknown active type.'),
        };
    }
}
