<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source\Common;

use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @internal
 */
final readonly class Factory
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator,
    ) {
    }

    public function record(string $json): TextRecord
    {
        return new TextRecord(
            $this->serializer,
            $this->validator,
            $json,
        );
    }
}