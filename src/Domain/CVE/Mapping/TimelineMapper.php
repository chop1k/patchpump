<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;

final class TimelineMapper
{
    public static function mapSchemaToPersistence(Schema\Timeline $schema): Persistence\Timeline
    {
        $persistence = new Persistence\Timeline();

        $persistence->setLanguage($schema->lang);
        $persistence->setContent($schema->value);
        $persistence->setTimestamp($schema->time);

        return $persistence;
    }
}