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
        $operator = strtolower($this->schema->operator ?? '');

        return match ($operator) {
            'and' => $this->and(),
            'or' => $this->or(),
            default => $this->null(),
        };
    }

    private function and(): Persistence\CPE\Applicability
    {
        return Persistence\CPE\Applicability::withAnd(
            $this->nodes(),
            $this->schema->negate,
        );
    }

    private function or(): Persistence\CPE\Applicability
    {
        return Persistence\CPE\Applicability::withOr(
            $this->nodes(),
            $this->schema->negate,
        );
    }

    private function null(): Persistence\CPE\Applicability
    {
        return Persistence\CPE\Applicability::withNull(
            $this->nodes(),
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
            array_values($this->schema->nodes),
        );

        return new ArrayCollection($elements);
    }
}
