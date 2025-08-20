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
        if (null === $this->schema->cveMetadata?->cveId) {
            throw new \InvalidArgumentException();
        }

        $state = $this->schema->cveMetadata?->state;

        return match ($state) {
            'PUBLISHED' => $this->published(),
            'REJECTED' => $this->rejected(),
            default => throw new \InvalidArgumentException(),
        };
    }

    private function published(): Persistence\Record
    {
        return new Persistence\Record(
            $this->schema->cveMetadata->cveId,
            $this->schema->cveMetadata->state,
            $this->publishedMetadata(),
            $this->publishedAssigner(),
            $this->publishedData(),
        );
    }

    private function rejected(): Persistence\Record
    {
        return new Persistence\Record(
            $this->schema->cveMetadata->cveId,
            $this->schema->cveMetadata->state,
            $this->rejectedMetadata(),
            $this->rejectedAssigner(),
            $this->rejectedData(),
        );
    }

    private function publishedMetadata(): Persistence\Record\Metadata\Published
    {
        return (new Metadata\Published($this->schema->cveMetadata))->toPersistence();
    }

    private function rejectedMetadata(): Persistence\Record\Metadata\Rejected
    {
        return (new Metadata\Rejected($this->schema->cveMetadata))->toPersistence();
    }

    private function publishedAssigner(): Persistence\Record\Metadata\Assigner\Published
    {
        return (new Metadata\Assigner\Published($this->schema->cveMetadata))->toPersistence();
    }

    private function rejectedAssigner(): Persistence\Record\Metadata\Assigner\Rejected
    {
        return (new Metadata\Assigner\Rejected($this->schema->cveMetadata))->toPersistence();
    }

    private function publishedData(): Persistence\Record\Data\Published
    {
        return (new Data\Published($this->schema->containers))->toPersistence();
    }

    private function rejectedData(): Persistence\Record\Data\Rejected
    {
        return (new Data\Rejected($this->schema->containers->cna))->toPersistence();
    }
}
