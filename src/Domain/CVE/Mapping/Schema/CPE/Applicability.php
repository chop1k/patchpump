<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\CPE;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @internal
 */
final readonly class Applicability
{
    public function __construct(
        private Schema\CPEApplicability $schema,
    ) {
    }

    public function toPersistence(): Persistence\CPE\Applicability
    {
        return new Persistence\CPE\Applicability(
            $this->nodes(),
            $this->operator(),
            $this->schema->negate,
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\CPE\Node>
     */
    private function nodes(): ArrayCollection
    {
        $elements = array_map(
            static fn (Schema\CPENode $node) => (new Node($node))->toPersistence(),
            $this->schema->nodes,
        );

        return new ArrayCollection($elements);
    }

    private function operator(): Persistence\CPE\Operator
    {
        $operator = strtolower($this->schema->operator ?? '');

        return match ($operator) {
            'and' => Persistence\CPE\Operator::And,
            'or' => Persistence\CPE\Operator::Or,
            default => null,
        };
    }
}
