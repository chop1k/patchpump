<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Schema\Record\Data;
use App\Domain\CVE\Mapping\Schema\Record\Metadata;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

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
     * @throws \InvalidArgumentException
     */
    public function toPersistence(): Persistence\Record
    {
        $state = $this->schema->cveMetadata?->state;

        return match ($state) {
            'PUBLISHED' => $this->published(),
            'REJECTED' => $this->rejected(),
            default => throw new \InvalidArgumentException(),
        };
    }

    /**
     * @return Persistence\Record<Metadata\Published, Metadata\Assigner\Published, Data\Published>
     */
    private function published(): Persistence\Record
    {
        if (null === $this->schema->cveMetadata?->cveId) {
            throw new \InvalidArgumentException();
        }

        return Persistence\Record::withPublished(
            $this->schema->cveMetadata->cveId,
            $this->publishedMetadata(),
            $this->publishedAssigner(),
            $this->publishedData(),
        );
    }

    /**
     * @return Persistence\Record<Metadata\Rejected, Metadata\Assigner\Rejected, Data\Rejected>
     */
    private function rejected(): Persistence\Record
    {
        if (null === $this->schema->cveMetadata?->cveId) {
            throw new \InvalidArgumentException();
        }

        return Persistence\Record::withRejected(
            $this->schema->cveMetadata->cveId,
            $this->rejectedMetadata(),
            $this->rejectedAssigner(),
            $this->rejectedData(),
        );
    }

    private function publishedMetadata(): Persistence\Record\Metadata\Published
    {
        if (null === $this->schema->cveMetadata) {
            throw new \InvalidArgumentException();
        }

        return (new Metadata\Published($this->schema->cveMetadata))->toPersistence();
    }

    private function rejectedMetadata(): Persistence\Record\Metadata\Rejected
    {
        if (null === $this->schema->cveMetadata) {
            throw new \InvalidArgumentException();
        }

        return (new Metadata\Rejected($this->schema->cveMetadata))->toPersistence();
    }

    private function publishedAssigner(): Persistence\Record\Metadata\Assigner\Published
    {
        if (null === $this->schema->cveMetadata) {
            throw new \InvalidArgumentException();
        }

        return (new Metadata\Assigner\Published($this->schema->cveMetadata))->toPersistence();
    }

    private function rejectedAssigner(): Persistence\Record\Metadata\Assigner\Rejected
    {
        if (null === $this->schema->cveMetadata) {
            throw new \InvalidArgumentException();
        }

        return (new Metadata\Assigner\Rejected($this->schema->cveMetadata))->toPersistence();
    }

    private function publishedData(): Persistence\Record\Data\Published
    {
        if (null === $this->schema->containers) {
            throw new \InvalidArgumentException();
        }

        return (new Data\Published($this->schema->containers))->toPersistence();
    }

    private function rejectedData(): Persistence\Record\Data\Rejected
    {
        if (null === $this->schema->containers?->cna) {
            throw new \InvalidArgumentException();
        }

        return (new Data\Rejected($this->schema->containers->cna))->toPersistence();
    }
}
