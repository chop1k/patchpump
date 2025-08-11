<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Common\ChaoticCollection;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\ApplicabilityOperator;

/**
 * @internal
 */
final readonly class CPEApplicability
{
    public function __construct(
        private Schema\CPEApplicability $schema,
    ) {
    }

    public function toPersistence(): Persistence\CPEApplicability
    {
        $persistence = new Persistence\CPEApplicability();

        $persistence->setOperator(
            match (strtolower($this->schema->operator ?? '')) {
                'and' => ApplicabilityOperator::And,
                'or' => ApplicabilityOperator::Or,
                default => null,
            }
        );

        $persistence->setNegate($this->schema->negate);

        if (null !== $this->schema->nodes) {
            $nodes = new ChaoticCollection(
                $this->schema->nodes,
                $this->mapNode(...),
            );

            $nodes = $nodes
                ->ensureInstanceOf(Schema\CPENode::class)
                ->map()
                ->toArrayCollection();

            $persistence->setNodes($nodes);
        }

        return $persistence;
    }

    private function mapNode(Schema\CPENode $node): Persistence\CPENode
    {
        $mapping = new CPENode($node);

        return $mapping->toPersistence();
    }
}
