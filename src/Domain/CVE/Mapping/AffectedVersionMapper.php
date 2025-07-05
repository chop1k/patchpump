<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\AffectionStatus;
use Doctrine\Common\Collections\ArrayCollection;

final class AffectedVersionMapper
{
    public static function mapSchemaToPersistence(Schema\AffectedVersion $schema): Persistence\AffectedVersion
    {
        $persistence = new Persistence\AffectedVersion();

        $persistence->setVersion($schema->version);
        $persistence->setType($schema->versionType);

        if (strtolower($schema->status ?? '') === 'unknown') {
            $persistence->setStatus(AffectionStatus::Unknown);
        }

        if (strtolower($schema->status ?? '') === 'affected') {
            $persistence->setStatus(AffectionStatus::Affected);
        }

        if (strtolower($schema->status ?? '') === 'unaffected') {
            $persistence->setStatus(AffectionStatus::Unaffected);
        }

        $persistence->setLessThan($schema->lessThan);
        $persistence->setLessThanOrEqual($schema->lessThanOrEqual);

        if ($schema->changes !== null) {
            $filtered = array_filter(
                $schema->changes,
                static fn (mixed $change) => is_object($change) && get_class($change) === Schema\AffectedVersionChange::class,
            );

            $persistence->setChanges(
                new ArrayCollection(
                    array_map(AffectedVersionChangeMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        return $persistence;
    }
}