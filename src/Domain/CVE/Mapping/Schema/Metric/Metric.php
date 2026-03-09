<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Metric;

use App\Domain\CVE\Schema;
use Doctrine\Common\Collections\ArrayCollection;
use InvalidArgumentException;

/**
 * @internal
 */
final readonly class Metric
{
    public function __construct(
        private Schema\Metric $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Metric\Container
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Metric\Container(
            $this->value(),
            $this->scenarios(),
        );
    }

    private function value(): mixed
    {
        if (null !== $this->schema->cvssV2_0) {
            return new Value\CVSS20($this->schema->cvssV2_0)->toPersistence();
        }

        if (null !== $this->schema->cvssV3_0) {
            return new Value\CVSS30($this->schema->cvssV3_0)->toPersistence();
        }

        if (null !== $this->schema->cvssV3_1) {
            return new Value\CVSS31($this->schema->cvssV3_1)->toPersistence();
        }

        if (null !== $this->schema->cvssV4_0) {
            return new Value\CVSS40($this->schema->cvssV4_0)->toPersistence();
        }

        if (null !== $this->schema->other) {
            return new Value\Other($this->schema->other)->toPersistence();
        }

        throw new InvalidArgumentException();
    }

    /**
     * @return ArrayCollection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Metric\Scenario>|null
     */
    private function scenarios(): ?ArrayCollection
    {
        $elements = array_map(
            static fn (Schema\MetricScenario $node) => new Scenario($node)->toPersistence(),
            array_values($this->schema->scenarios),
        );

        if (count($elements) <= 0) {
            return null;
        }

        return new ArrayCollection($elements);
    }
}
