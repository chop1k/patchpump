<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class MetricOther
{
    public function __construct(
        private Schema\Other $schema,
    ) {
    }

    public function toPersistence(): Persistence\MetricOther
    {
        $persistence = new Persistence\MetricOther();

        $persistence->setType($this->schema->type);
        $persistence->setContent($this->schema->content);

        return $persistence;
    }
}
