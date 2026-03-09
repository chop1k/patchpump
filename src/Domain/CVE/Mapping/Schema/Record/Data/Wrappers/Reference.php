<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\Common\Reference as Wrapped;
use App\Domain\CVE\Schema;

final readonly class Reference
{
    public function __construct(
        private string $providedBy,
        private Schema\Reference $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Reference
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Reference(
            $this->providedBy,
            $this->reference(),
        );
    }

    private function reference(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Reference
    {
        return new Wrapped($this->schema)->toPersistence();
    }
}
