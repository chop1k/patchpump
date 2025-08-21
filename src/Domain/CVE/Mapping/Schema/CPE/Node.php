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
        $operator = strtolower($this->schema->operator ?? '');

        return match ($operator) {
            'and' => $this->and(),
            'or' => $this->or(),
            default => throw new \InvalidArgumentException(),
        };
    }

    private function and(): Persistence\CPE\Node
    {
        return Persistence\CPE\Node::withAnd(
            $this->matches(),
            $this->schema->negate,
        );
    }

    private function or(): Persistence\CPE\Node
    {
        return Persistence\CPE\Node::withOr(
            $this->matches(),
            $this->schema->negate,
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\CPE\_Match>
     */
    private function matches(): ArrayCollection
    {
        if (null === $this->schema->cpeMatch) {
            throw new \InvalidArgumentException();
        }

        $elements = array_map(
            static fn (Schema\CPEMatch $node) => (new _Match($node))->toPersistence(),
            array_values($this->schema->cpeMatch),
        );

        return new ArrayCollection($elements);
    }
}
