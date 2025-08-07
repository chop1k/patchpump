<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\ApplicabilityOperator;
use Doctrine\Common\Collections\ArrayCollection;

final class CPENodeMapper
{
    public static function mapSchemaToPersistence(Schema\CPENode $schema): Persistence\CPENode
    {
        $persistence = new Persistence\CPENode();

        if ('and' === strtolower($schema->operator ?? '')) {
            $persistence->setOperator(ApplicabilityOperator::And);
        }

        if ('or' === strtolower($schema->operator ?? '')) {
            $persistence->setOperator(ApplicabilityOperator::Or);
        }

        $persistence->setNegate($schema->negate);

        if (null !== $schema->cpeMatch) {
            $filtered = array_filter(
                $schema->cpeMatch,
                static fn (mixed $change) => is_object($change) && Schema\CPEMatch::class === get_class($change),
            );

            $persistence->setMatches(
                new ArrayCollection(
                    array_map(CPEMatchMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        return $persistence;
    }
}
