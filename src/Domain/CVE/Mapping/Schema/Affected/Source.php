<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Affected;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Source
{
    public function __construct(
        private Schema\Affected $schema,
    ) {
    }

    public function toPersistence(): Persistence\Affected\Source
    {
        return new Persistence\Affected\Source(
            $this->schema->repo,
            $this->schema->modules,
            $this->schema->programFiles,
            $this->routines(),
        );
    }

    /**
     * @return string[]|null
     */
    private function routines(): ?array
    {
        if (null === $this->schema->programRoutines) {
            return null;
        }

        return array_map(
            static fn (Schema\AffectedRoutine $routine) => $routine->name,
            array_values($this->schema->programRoutines),
        );
    }
}
