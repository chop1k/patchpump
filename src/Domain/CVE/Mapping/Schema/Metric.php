<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Common\ChaoticCollection;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Metric
{
    public function __construct(
        private Schema\Metric $schema,
    ) {
    }

    public function toPersistence(): Persistence\Metric
    {
        $persistence = new Persistence\Metric();

        $cvss = [];

        if (null !== $this->schema->cvssV2_0) {
            $cvss[] = $this->schema->cvssV2_0->vectorString;
        }

        if (null !== $this->schema->cvssV3_0) {
            $cvss[] = $this->schema->cvssV3_0->vectorString;
        }

        if (null !== $this->schema->cvssV3_1) {
            $cvss[] = $this->schema->cvssV3_1->vectorString;
        }

        if (null !== $this->schema->cvssV4_0) {
            $cvss[] = $this->schema->cvssV4_0->vectorString;
        }

        if (count($cvss) > 0) {
            $persistence->setCvss($cvss);
        } else {
            unset($cvss);
        }

        if (null !== $this->schema->other) {
            $mapping = new MetricOther($this->schema->other);

            $persistence->setOther($mapping->toPersistence());
        }

        if (null !== $this->schema->scenarios) {
            $scenarios = new ChaoticCollection(
                $this->schema->scenarios,
                $this->mapScenario(...),
            );

            $scenarios = $scenarios
                ->ensureInstanceOf(Schema\MetricScenario::class)
                ->map()
                ->toArrayCollection();

            $persistence->setScenarios($scenarios);
        }

        return $persistence;
    }

    private function mapScenario(Schema\MetricScenario $scenario): Persistence\MetricScenario
    {
        $mapping = new MetricScenario($scenario);

        return $mapping->toPersistence();
    }
}
