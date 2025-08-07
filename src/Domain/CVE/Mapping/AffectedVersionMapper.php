<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
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

        if ('unknown' === strtolower($schema->status ?? '')) {
            $persistence->setStatus(AffectionStatus::Unknown);
        }

        if ('affected' === strtolower($schema->status ?? '')) {
            $persistence->setStatus(AffectionStatus::Affected);
        }

        if ('unaffected' === strtolower($schema->status ?? '')) {
            $persistence->setStatus(AffectionStatus::Unaffected);
        }

        $persistence->setLessThan($schema->lessThan);
        $persistence->setLessThanOrEqual($schema->lessThanOrEqual);

        if (null !== $schema->changes) {
            $filtered = array_filter(
                $schema->changes,
                static fn (mixed $change) => is_object($change) && Schema\AffectedVersionChange::class === get_class($change),
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
