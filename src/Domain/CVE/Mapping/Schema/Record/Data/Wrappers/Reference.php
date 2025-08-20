<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\Common\Reference as Wrapped;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Reference
{
    public function __construct(
        private string $providedBy,
        private Schema\Reference $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Wrappers\Reference
    {
        return new Persistence\Record\Data\Wrappers\Reference(
            $this->providedBy,
            $this->reference(),
        );
    }

    private function reference(): Persistence\Common\Reference
    {
        return (new Wrapped($this->schema))->toPersistence();
    }
}
