<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\Common\Timeline as Wrapped;
use App\Domain\CVE\Schema;

final readonly class Timeline
{
    public function __construct(
        private string $providedBy,
        private Schema\Timeline $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Timeline
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Timeline(
            $this->providedBy,
            $this->timeline(),
        );
    }

    private function timeline(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Timeline
    {
        return new Wrapped($this->schema)->toPersistence();
    }
}
