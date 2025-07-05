<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;

final class MetricScenarioMapper
{
    public static function mapSchemaToPersistence(Schema\MetricScenario $schema): Persistence\MetricScenario
    {
        $persistence = new Persistence\MetricScenario();

        $persistence->setLanguage($schema->lang);
        $persistence->setContent($schema->value);

        return $persistence;
    }
}