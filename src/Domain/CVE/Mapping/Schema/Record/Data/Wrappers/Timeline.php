<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\Common\Timeline as Wrapped;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Timeline
{
    public function __construct(
        private string $providedBy,
        private Schema\Timeline $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Wrappers\Timeline
    {
        return new Persistence\Record\Data\Wrappers\Timeline(
            $this->providedBy,
            $this->timeline(),
        );
    }

    private function timeline(): Persistence\Common\Timeline
    {
        return (new Wrapped($this->schema))->toPersistence();
    }
}
