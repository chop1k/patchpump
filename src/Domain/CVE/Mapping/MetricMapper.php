<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final class MetricMapper
{
    public static function mapSchemaToPersistence(Schema\Metric $schema): Persistence\Metric
    {
        $persistence = new Persistence\Metric();

        $cvss = [];

        if ($schema->cvssV2_0 !== null) {
            $cvss[] = $schema->cvssV2_0->vectorString;
        }

        if ($schema->cvssV3_0 !== null) {
            $cvss[] = $schema->cvssV3_0->vectorString;
        }

        if ($schema->cvssV3_1 !== null) {
            $cvss[] = $schema->cvssV3_1->vectorString;
        }

        if ($schema->cvssV4_0 !== null) {
            $cvss[] = $schema->cvssV4_0->vectorString;
        }

        if (count($cvss) > 0) {
            $persistence->setCvss($cvss);
        } else {
            unset($cvss);
        }

        if ($schema->other !== null) {
            $persistence->setOther(
                MetricOtherMapper::mapSchemaToPersistence($schema->other),
            );
        }

        if ($schema->scenarios !== null) {
            $filtered = array_filter(
                $schema->scenarios,
                static fn (mixed $scenario) => is_object($scenario) && get_class($scenario) === Schema\MetricScenario::class,
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