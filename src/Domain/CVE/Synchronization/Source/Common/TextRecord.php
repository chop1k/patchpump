<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source\Common;

use App\Domain\CVE\Schema\Record;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @internal
 */
final readonly class TextRecord
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator,
        private string $json,
    ) {
    }

    public function serialize(): SerializedRecord
    {
        return new SerializedRecord(
            $this->validator,
            $this->serializer->deserialize($this->json, Record::class, 'json'),
        );
    }
}
