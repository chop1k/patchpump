<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\ApplicabilityOperator;
use Doctrine\Common\Collections\ArrayCollection;

final class CPEApplicabilityMapper
{
    public static function mapSchemaToPersistence(Schema\CPEApplicability $schema): Persistence\CPEApplicability
    {
        $persistence = new Persistence\CPEApplicability();

        if ('and' === strtolower($schema->operator ?? '')) {
            $persistence->setOperator(ApplicabilityOperator::And);
        }

        if ('or' === strtolower($schema->operator ?? '')) {
            $persistence->setOperator(ApplicabilityOperator::Or);
        }

        $persistence->setNegate($schema->negate);

        if (null !== $schema->nodes) {
            $filtered = array_filter(
                $schema->nodes,
                static fn (mixed $node) => is_object($node) && Schema\CPENode::class === get_class($node),
            );

            $persistence->setNodes(
                new ArrayCollection(
                    array_map(CPENodeMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        return $persistence;
    }
}
