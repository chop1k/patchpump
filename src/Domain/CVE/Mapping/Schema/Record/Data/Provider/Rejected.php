<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Provider;

use App\Domain\CVE\Mapping\Common\Timestamp;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Rejected
{
    public function __construct(
        private Schema\ProviderMetadata $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Provider\Rejected
    {
        return new Persistence\Record\Data\Provider\Rejected(
            $this->schema->orgId,
            $this->schema->shortName,
            $this->updatedAt(),
        );
    }

    private function updatedAt(): ?\DateTimeImmutable
    {
        $timestamp = new Timestamp($this->schema->dateUpdated);

        try {
            return $timestamp->toDateTimeImmutable();
        } catch (\InvalidArgumentException) {
            return null;
        }
    }
}
