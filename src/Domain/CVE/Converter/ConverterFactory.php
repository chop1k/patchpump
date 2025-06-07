<?php

declare(strict_types=1);

namespace App\Domain\CVE\Converter;

final class ConverterFactory
{
    public function createAppropriateConverter(array $data): ConverterInterface
    {
        $version = $data['dataVersion'] ?? null;

        if (null === $version || false === is_string($version)) {
            throw new \InvalidArgumentException('Missing data version');
        }

        return match ($version) {
            '5.1' => new Mitre0501Converter(),
            default => throw new \InvalidArgumentException('Missing converter'),
        };
    }
}
