<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\ApplicabilityOperator;
use Doctrine\Common\Collections\ArrayCollection;

final class CPEApplicabilityMapper
{
    public static function mapSchemaToPersistence(Schema\CPEApplicability $schema): Persistence\CPEApplicability
    {
        $persistence = new Persistence\CPEApplicability();

        if (strtolower($schema->operator ?? '') === 'and') {
            $persistence->setOperator(ApplicabilityOperator::And);
        }

        if (strtolower($schema->operator ?? '') === 'or') {
            $persistence->setOperator(ApplicabilityOperator::Or);
        }

        $persistence->setNegate($schema->negate);

        if ($schema->nodes !== null) {
            $filtered = array_filter(
                $schema->nodes,
                static fn (mixed $node) => is_object($node) && get_class($node) === Schema\CPENode::class,
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