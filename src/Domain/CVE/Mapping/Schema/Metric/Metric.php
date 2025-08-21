<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Metric;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @internal
 */
final readonly class Metric
{
    public function __construct(
        private Schema\Metric $schema,
    ) {
    }

    public function toPersistence(): Persistence\Metric\Container
    {
        return new Persistence\Metric\Container(
            $this->value(),
            $this->scenarios(),
        );
    }

    private function value(): mixed
    {
        if (null !== $this->schema->cvssV2_0) {
            return (new Value\CVSS20($this->schema->cvssV2_0))->toPersistence();
        }

        if (null !== $this->schema->cvssV3_0) {
            return (new Value\CVSS30($this->schema->cvssV3_0))->toPersistence();
        }

        if (null !== $this->schema->cvssV3_1) {
            return (new Value\CVSS31($this->schema->cvssV3_1))->toPersistence();
        }

        if (null !== $this->schema->cvssV4_0) {
            return (new Value\CVSS40($this->schema->cvssV4_0))->toPersistence();
        }

        if (null !== $this->schema->other) {
            return (new Value\Other($this->schema->other))->toPersistence();
        }

        throw new \InvalidArgumentException();
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Metric\Scenario>|null
     */
    private function scenarios(): ?ArrayCollection
    {
        $elements = array_map(
            static fn (Schema\MetricScenario $node) => (new Scenario($node))->toPersistence(),
            array_values($this->schema->scenarios),
        );

        if (count($elements) <= 0) {
            return null;
        }

        return new ArrayCollection($elements);
    }
}
