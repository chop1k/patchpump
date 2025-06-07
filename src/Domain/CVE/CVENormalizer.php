<?php

declare(strict_types=1);

namespace App\Domain\CVE;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class CVENormalizer implements NormalizerInterface, DenormalizerInterface
{

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
    }

    public function getSupportedTypes(?string $format): array
    {
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
    }
}