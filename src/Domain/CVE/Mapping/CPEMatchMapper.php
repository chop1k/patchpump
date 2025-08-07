<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final class CPEMatchMapper
{
    public static function mapSchemaToPersistence(Schema\CPEMatch $schema): Persistence\CPEMatch
    {
        $persistence = new Persistence\CPEMatch();

        $persistence->setVulnerable($schema->vulnerable);
        $persistence->setCriteria($schema->criteria);
        $persistence->setMatchCriteriaId($schema->matchCriteriaId);
        $persistence->setVersionStartIncluding($schema->versionStartIncluding);
        $persistence->setVersionStartExcluding($schema->versionStartExcluding);
        $persistence->setVersionEndIncluding($schema->versionEndIncluding);
        $persistence->setVersionEndExcluding($schema->versionEndExcluding);

        return $persistence;
    }
}
