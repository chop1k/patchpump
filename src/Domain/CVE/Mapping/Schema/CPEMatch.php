<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class CPEMatch
{
    public function __construct(
        private Schema\CPEMatch $schema,
    ) {
    }

    public function toPersistence(): Persistence\CPEMatch
    {
        $persistence = new Persistence\CPEMatch();

        $persistence->setVulnerable($this->schema->vulnerable);
        $persistence->setCriteria($this->schema->criteria);
        $persistence->setMatchCriteriaId($this->schema->matchCriteriaId);
        $persistence->setVersionStartIncluding($this->schema->versionStartIncluding);
        $persistence->setVersionStartExcluding($this->schema->versionStartExcluding);
        $persistence->setVersionEndIncluding($this->schema->versionEndIncluding);
        $persistence->setVersionEndExcluding($this->schema->versionEndExcluding);

        return $persistence;
    }
}
