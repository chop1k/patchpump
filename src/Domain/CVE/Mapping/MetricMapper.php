<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final class MetricMapper
{
    public static function mapSchemaToPersistence(Schema\Metric $schema): Persistence\Metric
    {
        $persistence = new Persistence\Metric();

        $cvss = [];

        if (null !== $schema->cvssV2_0) {
            $cvss[] = $schema->cvssV2_0->vectorString;
        }

        if (null !== $schema->cvssV3_0) {
            $cvss[] = $schema->cvssV3_0->vectorString;
        }

        if (null !== $schema->cvssV3_1) {
            $cvss[] = $schema->cvssV3_1->vectorString;
        }

        if (null !== $schema->cvssV4_0) {
            $cvss[] = $schema->cvssV4_0->vectorString;
        }

        if (count($cvss) > 0) {
            $persistence->setCvss($cvss);
        } else {
            unset($cvss);
        }

        if (null !== $schema->other) {
            $persistence->setOther(
                MetricOtherMapper::mapSchemaToPersistence($schema->other),
            );
        }

        if (null !== $schema->scenarios) {
            $filtered = array_filter(
                $schema->scenarios,
                static fn (mixed $scenario) => is_object($scenario) && Schema\MetricScenario::class === get_class($scenario),
            );

            $persistence->setScenarios(
                new ArrayCollection(
                    array_map(MetricScenarioMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        return $persistence;
    }
}
