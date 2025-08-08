<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Common\ChaoticCollection;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\ApplicabilityOperator;

final readonly class CPENode
{
    public function __construct(
        private Schema\CPENode $schema,
    ) {
    }

    public function toPersistence(): Persistence\CPENode
    {
        $persistence = new Persistence\CPENode();

        $persistence->setOperator(
            match (strtolower($this->schema->operator ?? '')) {
                'and' => ApplicabilityOperator::And,
                'or' => ApplicabilityOperator::Or,
                default => null,
            }
        );

        $persistence->setNegate($this->schema->negate);

        if (null !== $this->schema->cpeMatch) {
            $matches = new ChaoticCollection(
                $this->schema->cpeMatch,
                $this->mapMatch(...),
            );

            $matches = $matches
                ->ensureInstanceOf(Schema\CPEMatch::class)
                ->map()
                ->toArrayCollection();

            $persistence->setMatches($matches);
        }

        return $persistence;
    }

    private function mapMatch(Schema\CPEMatch $match): Persistence\CPEMatch
    {
        $mapping = new CPEMatch($match);

        return $mapping->toPersistence();
    }
}
