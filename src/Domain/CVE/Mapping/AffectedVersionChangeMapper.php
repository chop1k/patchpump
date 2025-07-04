<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\AffectionStatus;

final class AffectedVersionChangeMapper
{
    public static function mapSchemaToPersistence(?Schema\AffectedVersionChange $schema): ?Persistence\AffectedVersionChange
    {
        if (null === $schema) {
            return null;
        }

        $persistence = new Persistence\AffectedVersionChange();

        $persistence->setAt($schema->at);

        if (strtolower($schema->status) === 'unknown') {
            $persistence->setStatus(AffectionStatus::Unknown);
        }

        if (strtolower($schema->status) === 'affected') {
            $persistence->setStatus(AffectionStatus::Affected);
        }

        if (strtolower($schema->status) === 'unaffected') {
            $persistence->setStatus(AffectionStatus::Unaffected);
        }

        return $persistence;
    }
}