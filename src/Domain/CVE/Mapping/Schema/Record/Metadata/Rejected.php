<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Metadata;

use App\Domain\CVE\Mapping\Common\Timestamp;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Rejected
{
    public function __construct(
        private Schema\RecordMetadata $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Metadata\Rejected
    {
        return new Persistence\Record\Metadata\Rejected(
            $this->schema->serial,
            $this->timestamp($this->schema->datePublished),
            $this->timestamp($this->schema->dateReserved),
            $this->timestamp($this->schema->dateUpdated),
            $this->timestamp($this->schema->dateRejected),
        );
    }

    private function timestamp(?string $timestamp): ?\DateTimeImmutable
    {
        if (null === $timestamp) {
            return null;
        }

        $timestamp = new Timestamp($timestamp);

        try {
            return $timestamp->toDateTimeImmutable();
        } catch (\InvalidArgumentException) {
            return null;
        }
    }
}
