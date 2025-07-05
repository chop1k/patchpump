<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
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

        if ($schema->cveMetadata !== null) {
            $persistence->setMetadata(
                RecordMetadataMapper::mapSchemaToPersistenceMetadata($schema->cveMetadata),
            );
            $persistence->setAssigner(
                RecordMetadataMapper::mapSchemaToPersistenceAssigner($schema->cveMetadata),
            );
        }

        if ($schema->containers === null) {
            return $persistence;
        }

        if ($schema->containers->cna !== null) {
            if ($persistence->getMetadata()?->getState() === RecordState::Published) {
                $persistence->setPublishedCNA(
                    RecordContainersMapper::mapSchemaCNAToPersistencePublished($schema->containers->cna),
                );
            }

            if ($persistence->getMetadata()?->getState() === RecordState::Rejected) {
                $persistence->setRejectedCNA(
                    RecordContainersMapper::mapSchemaCNAToPersistenceRejected($schema->containers->cna),
                );
            }
        }

        if ($schema->containers->adp !== null) {
            $filtered = array_filter(
                $schema->containers->adp,
                static fn (mixed $adp) => is_object($adp) && get_class($adp) === Schema\CNA::class,
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