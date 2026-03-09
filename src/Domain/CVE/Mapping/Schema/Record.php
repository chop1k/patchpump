<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Schema\Record\Data;
use App\Domain\CVE\Mapping\Schema\Record\Metadata;
use App\Domain\CVE\Schema;
use InvalidArgumentException;

/**
 * @internal
 */
final readonly class Record
{
    public function __construct(
        private Schema\Record $schema,
    ) {
    }

    /**
     * @throws InvalidArgumentException
     */
    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\AbstractRecord
    {
        $state = $this->schema->cveMetadata?->state;

        return match ($state) {
            'PUBLISHED' => $this->published(),
            'REJECTED' => $this->rejected(),
            default => throw new InvalidArgumentException(),
        };
    }

    private function published(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Published
    {
        if (null === $this->schema->cveMetadata?->cveId) {
            throw new InvalidArgumentException();
        }

        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Published(
            $this->schema->cveMetadata->cveId,
            $this->publishedAssigner(),
            $this->publishedData(),
            $this->publishedMetadata(),
        );
    }

    private function rejected(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Rejected
    {
        if (null === $this->schema->cveMetadata?->cveId) {
            throw new InvalidArgumentException();
        }

        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Rejected(
            $this->schema->cveMetadata->cveId,
            $this->rejectedAssigner(),
            $this->rejectedData(),
            $this->rejectedMetadata(),
        );
    }

    private function publishedMetadata(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Metadata\Published
    {
        if (null === $this->schema->cveMetadata) {
            throw new InvalidArgumentException();
        }

        return new Metadata\Published($this->schema->cveMetadata)->toPersistence();
    }

    private function rejectedMetadata(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Metadata\Rejected
    {
        if (null === $this->schema->cveMetadata) {
            throw new InvalidArgumentException();
        }

        return new Metadata\Rejected($this->schema->cveMetadata)->toPersistence();
    }

    private function publishedAssigner(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Metadata\Assigner\Published
    {
        if (null === $this->schema->cveMetadata) {
            throw new InvalidArgumentException();
        }

        return new Metadata\Assigner\Published($this->schema->cveMetadata)->toPersistence();
    }

    private function rejectedAssigner(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Metadata\Assigner\Rejected
    {
        if (null === $this->schema->cveMetadata) {
            throw new InvalidArgumentException();
        }

        return new Metadata\Assigner\Rejected($this->schema->cveMetadata)->toPersistence();
    }

    private function publishedData(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Published
    {
        if (null === $this->schema->containers) {
            throw new InvalidArgumentException();
        }

        return new Data\Published($this->schema->containers)->toPersistence();
    }

    private function rejectedData(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Rejected
    {
        if (null === $this->schema->containers?->cna) {
            throw new InvalidArgumentException();
        }

        return new Data\Rejected($this->schema->containers->cna)->toPersistence();
    }
}
