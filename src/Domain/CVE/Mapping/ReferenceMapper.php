<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final class ReferenceMapper
{
    public static function mapSchemaToPersistence(Schema\Reference $schema): Persistence\Reference
    {
        $persistence = new Persistence\Reference();

        $persistence->setName($schema->name);
        $persistence->setUrl($schema->url);
        $persistence->setTags($schema->tags);

        return $persistence;
    }
}
