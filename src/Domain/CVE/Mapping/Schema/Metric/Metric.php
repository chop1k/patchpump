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
            return $this->cvss20();
        }

        if (null !== $this->schema->cvssV3_0) {
            return $this->cvss30();
        }

        if (null !== $this->schema->cvssV3_1) {
            return $this->cvss31();
        }

        if (null !== $this->schema->cvssV4_0) {
            return $this->cvss40();
        }

        if (null !== $this->schema->other) {
            return $this->other();
        }

        throw new \InvalidArgumentException();
    }

    private function cvss20(): Persistence\Metric\Value\CVSS20
    {
        return (new Value\CVSS20($this->schema->cvssV2_0))->toPersistence();
    }

    private function cvss30(): Persistence\Metric\Value\CVSS30
    {
        return (new Value\CVSS30($this->schema->cvssV3_0))->toPersistence();
    }

    private function cvss31(): Persistence\Metric\Value\CVSS31
    {
        return (new Value\CVSS31($this->schema->cvssV3_1))->toPersistence();
    }

    private function cvss40(): Persistence\Metric\Value\CVSS40
    {
        return (new Value\CVSS40($this->schema->cvssV4_0))->toPersistence();
    }

    private function other(): Persistence\Metric\Value\Other
    {
        return (new Value\Other($this->schema->other))->toPersistence();
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Metric\Scenario>
     */
    private function scenarios(): ArrayCollection
    {
        $elements = array_map(
            static fn (Schema\MetricScenario $node) => (new Scenario($node))->toPersistence(),
            $this->schema->scenarios,
        );

        return new ArrayCollection($elements);
    }
}
