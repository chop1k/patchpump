<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Provider;

use App\Domain\CVE\Mapping\Common\Timestamp;
use App\Domain\CVE\Schema;
use DateTimeImmutable;
use InvalidArgumentException;

final readonly class Published
{
    public function __construct(
        private Schema\CNA $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Provider\Published
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Provider\Published(
            $this->schema->providerMetadata->orgId,
            $this->schema->providerMetadata->shortName,
            $this->timestamp($this->schema->providerMetadata->dateUpdated),
            $this->timestamp($this->schema->datePublic),
            $this->timestamp($this->schema->dateAssigned)
        );
    }

    private function timestamp(?string $timestamp): ?DateTimeImmutable
    {
        if (null === $timestamp) {
            return null;
        }

        $timestamp = new Timestamp($timestamp);

        try {
            return $timestamp->toDateTimeImmutable();
        } catch (InvalidArgumentException) {
            return null;
        }
    }
}
