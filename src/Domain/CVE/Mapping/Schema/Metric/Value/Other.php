<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Metric\Value;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Other
{
    public function __construct(
        private Schema\Other $schema,
    ) {
    }

    public function toPersistence(): Persistence\Metric\Value\Other
    {
        return new Persistence\Metric\Value\Other(
            $this->schema->type,
            $this->schema->content,
        );
    }
}
