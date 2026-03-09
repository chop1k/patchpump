<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\Affected\Affected as Wrapped;
use App\Domain\CVE\Schema;

final readonly class Affected
{
    public function __construct(
        private string $providedBy,
        private Schema\Affected $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Affected
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Affected(
            $this->providedBy,
            $this->affected(),
        );
    }

    private function affected(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\AbstractAffected
    {
        return new Wrapped($this->schema)->toPersistence();
    }
}
