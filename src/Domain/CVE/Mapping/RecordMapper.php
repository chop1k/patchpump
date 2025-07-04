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

        $persistence->setMetadata(
            RecordMetadataMapper::mapSchemaToPersistenceMetadata($schema->cveMetadata),
        );
        $persistence->setAssigner(
            RecordMetadataMapper::mapSchemaToPersistenceAssigner($schema->cveMetadata),
        );

        if ($persistence->getMetadata()?->getState() === RecordState::Published) {
            $persistence->setPublishedCNA(
                RecordContainersMapper::mapSchemaCNAToPersistencePublished($schema->containers?->cna),
            );
        }

        if ($persistence->getMetadata()?->getState() === RecordState::Rejected) {
            $persistence->setRejectedCNA(
                RecordContainersMapper::mapSchemaCNAToPersistenceRejected($schema->containers?->cna),
            );
        }

        if ($schema->containers?->adp !== null) {
            $persistence->setAdp(
                new ArrayCollection(
                    array_map(RecordContainersMapper::mapSchemaADPToPersistence(...), $schema->containers?->adp)
                ),
            );
        }

        return $persistence;
    }
}