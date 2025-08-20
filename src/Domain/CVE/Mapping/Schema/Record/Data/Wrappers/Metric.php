<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\Metric\Metric as Wrapped;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Metric
{
    public function __construct(
        private string $providedBy,
        private Schema\Metric $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Wrappers\Metric
    {
        return new Persistence\Record\Data\Wrappers\Metric(
            $this->providedBy,
            $this->metric(),
        );
    }

    private function metric(): Persistence\Metric\Container
    {
        return (new Wrapped($this->schema))->toPersistence();
    }
}
