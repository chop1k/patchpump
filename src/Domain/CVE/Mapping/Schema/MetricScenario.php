<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class MetricScenario
{
    public function __construct(
        private Schema\MetricScenario $schema,
    ) {
    }

    public function toPersistence(): Persistence\MetricScenario
    {
        $persistence = new Persistence\MetricScenario();

        $persistence->setLanguage($this->schema->lang);
        $persistence->setContent($this->schema->value);

        return $persistence;
    }
}
