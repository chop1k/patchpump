<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\AffectionStatus;

final readonly class AffectedVersionChange
{
    public function __construct(
        private Schema\AffectedVersionChange $schema,
    ) {
    }

    public function toPersistence(): Persistence\AffectedVersionChange
    {
        $persistence = new Persistence\AffectedVersionChange();

        $persistence->setAt($this->schema->at);

        $status = strtolower($this->schema->status ?? '');

        $persistence->setStatus(
            match ($status) {
                'unknown' => AffectionStatus::Unknown,
                'affected' => AffectionStatus::Affected,
                'unaffected' => AffectionStatus::Unaffected,
                default => null,
            }
        );

        return $persistence;
    }
}
