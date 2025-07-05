<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;

final class MetricOtherMapper
{
    public static function mapSchemaToPersistence(Schema\Other $schema): Persistence\MetricOther
    {
        $persistence = new Persistence\MetricOther();

        $persistence->setType($schema->type);
        $persistence->setContent($schema->content);

        return $persistence;
    }
}