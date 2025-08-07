<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\AffectionStatus;

final class AffectedVersionChangeMapper
{
    public static function mapSchemaToPersistence(Schema\AffectedVersionChange $schema): Persistence\AffectedVersionChange
    {
        $persistence = new Persistence\AffectedVersionChange();

        $persistence->setAt($schema->at);

        if ('unknown' === strtolower($schema->status ?? '')) {
            $persistence->setStatus(AffectionStatus::Unknown);
        }

        if ('affected' === strtolower($schema->status ?? '')) {
            $persistence->setStatus(AffectionStatus::Affected);
        }

        if ('unaffected' === strtolower($schema->status ?? '')) {
            $persistence->setStatus(AffectionStatus::Unaffected);
        }

        return $persistence;
    }
}
