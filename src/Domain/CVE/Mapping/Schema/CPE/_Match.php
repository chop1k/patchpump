<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\CPE;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

/**
 * @internal
 */
final readonly class _Match
{
    public function __construct(
        private Schema\CPEMatch $schema,
    ) {
    }

    public function toPersistence(): Persistence\CPE\_Match
    {
        return new Persistence\CPE\_Match(
            $this->schema->vulnerable,
            $this->schema->criteria,
            $this->schema->matchCriteriaId,
            $this->schema->versionStartIncluding,
            $this->schema->versionStartExcluding,
            $this->schema->versionEndIncluding,
            $this->schema->versionEndExcluding
        );
    }
}
