<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\RecordState;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @todo empty arrays check
 * @todo fix tests
 */
final class RecordMapper
{
    public static function mapPersistenceToSchema(Persistence\Record $persistence): Schema\Record
    {
    }

    public static function mapSchemaToPersistence(Schema\Record $schema): Persistence\Record
    {
        $persistence = new Persistence\Record();

        $persistence->setId($schema->cveMetadata?->cveId);

        if (null !== $schema->cveMetadata) {
            $persistence->setMetadata(
                RecordMetadataMapper::mapSchemaToPersistenceMetadata($schema->cveMetadata),
            );
            $persistence->setAssigner(
                RecordMetadataMapper::mapSchemaToPersistenceAssigner($schema->cveMetadata),
            );
        }

        if (null === $schema->containers) {
            return $persistence;
        }

        if (null !== $schema->containers->cna) {
            if (RecordState::Published === $persistence->getMetadata()?->getState()) {
                $persistence->setPublishedCNA(
                    RecordContainersMapper::mapSchemaCNAToPersistencePublished($schema->containers->cna),
                );
            }

            if (RecordState::Rejected === $persistence->getMetadata()?->getState()) {
                $persistence->setRejectedCNA(
                    RecordContainersMapper::mapSchemaCNAToPersistenceRejected($schema->containers->cna),
                );
            }
        }

        if (null !== $schema->containers->adp) {
            $filtered = array_filter(
                $schema->containers->adp,
                static fn (mixed $adp) => is_object($adp) && Schema\CNA::class === get_class($adp),
            );

            $persistence->setAdp(
                new ArrayCollection(
                    array_map(RecordContainersMapper::mapSchemaADPToPersistence(...), $filtered),
                ),
            );
        }

        return $persistence;
    }
}
