<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\Affected\Affected as Wrapped;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Affected
{
    public function __construct(
        private string $providedBy,
        private Schema\Affected $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Wrappers\Affected
    {
        return new Persistence\Record\Data\Wrappers\Affected(
            $this->providedBy,
            $this->affected(),
        );
    }

    private function affected(): Persistence\Affected\AbstractAffected
    {
        return (new Wrapped($this->schema))->toPersistence();
    }
}
