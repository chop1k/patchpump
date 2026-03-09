<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Metric;

use App\Domain\CVE\Schema;
use InvalidArgumentException;

/**
 * @internal
 */
final readonly class Scenario
{
    public function __construct(
        private Schema\MetricScenario $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Metric\Scenario
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Metric\Scenario(
            $this->language(),
            $this->value(),
        );
    }

    private function language(): string
    {
        return $this->schema->lang ?? throw new InvalidArgumentException();
    }

    private function value(): string
    {
        return $this->schema->value ?? throw new InvalidArgumentException();
    }
}
