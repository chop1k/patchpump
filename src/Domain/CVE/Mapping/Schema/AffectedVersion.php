<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Common\ChaoticCollection;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\AffectionStatus;

/**
 * @internal
 */
final readonly class AffectedVersion
{
    public function __construct(
        private Schema\AffectedVersion $schema,
    ) {
    }

    public function toPersistence(): Persistence\AffectedVersion
    {
        $persistence = new Persistence\AffectedVersion();

        $persistence->setVersion($this->schema->version);
        $persistence->setType($this->schema->versionType);

        $status = strtolower($this->schema->status ?? '');

        $persistence->setStatus(
            match ($status) {
                'unknown' => AffectionStatus::Unknown,
                'affected' => AffectionStatus::Affected,
                'unaffected' => AffectionStatus::Unaffected,
                default => null,
            }
        );

        $persistence->setLessThan($this->schema->lessThan);
        $persistence->setLessThanOrEqual($this->schema->lessThanOrEqual);

        if (null !== $this->schema->changes) {
            $changes = new ChaoticCollection(
                $this->schema->changes,
                $this->mapChange(...),
            );

            $changes = $changes
                ->ensureInstanceOf(AffectedVersionChange::class)
                ->map()
                ->toArrayCollection();

            $persistence->setChanges($changes);
        }

        return $persistence;
    }

    private function mapChange(Schema\AffectedVersionChange $change): Persistence\AffectedVersionChange
    {
        $mapping = new AffectedVersionChange($change);

        return $mapping->toPersistence();
    }
}
