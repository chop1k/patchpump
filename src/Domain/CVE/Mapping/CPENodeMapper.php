<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\ApplicabilityOperator;
use Doctrine\Common\Collections\ArrayCollection;

final class CPENodeMapper
{
    public static function mapSchemaToPersistence(?Schema\CPENode $schema): ?Persistence\CPENode
    {
        if (null === $schema) {
            return null;
        }

        $persistence = new Persistence\CPENode();

        if (strtolower($schema->operator) === 'and') {
            $persistence->setOperator(ApplicabilityOperator::And);
        }

        if (strtolower($schema->operator) === 'or') {
            $persistence->setOperator(ApplicabilityOperator::Or);
        }

        $persistence->setNegate($schema->negate);

        if ($schema->cpeMatch !== null) {
            $persistence->setMatches(
                new ArrayCollection(
                    array_map(CPEMatchMapper::mapSchemaToPersistence(...), $schema->cpeMatch),
                ),
            );
        }

        return $persistence;
    }
}