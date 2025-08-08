<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Common\ChaoticCollection;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Record
{
    public function __construct(
        private Schema\Record $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record
    {
        $persistence = new Persistence\Record();

        $persistence->setId($this->schema->cveMetadata?->cveId);

        if (null !== $this->schema->cveMetadata) {
            $mapping = new RecordMetadata($this->schema->cveMetadata);

            $persistence->setMetadata($mapping->toPersistenceMetadata());
            $persistence->setAssigner($mapping->toPersistenceAssigner());
        }

        if (null === $this->schema->containers) {
            return $persistence;
        }

        if (null !== $this->schema->containers->cna) {
            $mapping = new RecordContainers($this->schema->containers->cna);

            if (RecordState::Published === $persistence->getMetadata()?->getState()) {
                $persistence->setPublishedCNA($mapping->toPersistencePublishedCNA());
            }

            if (RecordState::Rejected === $persistence->getMetadata()?->getState()) {
                $persistence->setRejectedCNA($mapping->toPersistenceRejectedCNA());
            }
        }

        if (null !== $this->schema->containers->adp) {
            $adp = new ChaoticCollection(
                $this->schema->containers->adp,
                $this->mapADP(...),
            );

            $adp = $adp
                ->ensureInstanceOf(Schema\CNA::class)
                ->map()
                ->toArrayCollection();

            $persistence->setAdp($adp);
        }

        return $persistence;
    }

    private function mapADP(Schema\CNA $adp): Persistence\ADP
    {
        $mapping = new RecordContainers($adp);

        return $mapping->toPersistenceADP();
    }
}
