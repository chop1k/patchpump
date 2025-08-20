<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\CPE;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @internal
 */
final readonly class Node
{
    public function __construct(
        private Schema\CPENode $schema,
    ) {
    }

    public function toPersistence(): Persistence\CPE\Node
    {
        return new Persistence\CPE\Node(
            $this->operator(),
            $this->matches(),
            $this->schema->negate,
        );
    }

    private function operator(): Persistence\CPE\Operator
    {
        $operator = strtolower($this->schema->operator ?? '');

        return match ($operator) {
            'and' => Persistence\CPE\Operator::And,
            'or' => Persistence\CPE\Operator::Or,
            default => throw new \InvalidArgumentException(),
        };
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\CPE\_Match>
     */
    private function matches(): ArrayCollection
    {
        $elements = array_map(
            static fn (Schema\CPEMatch $node) => (new _Match($node))->toPersistence(),
            $this->schema->cpeMatch,
        );

        return new ArrayCollection($elements);
    }
}
