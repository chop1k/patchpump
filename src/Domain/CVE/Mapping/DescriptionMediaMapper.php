<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;

final class DescriptionMediaMapper
{
    public static function mapSchemaToPersistence(Schema\DescriptionMedia $schema): Persistence\DescriptionMedia
    {
        $persistence = new Persistence\DescriptionMedia();

        $persistence->setType($schema->type);
        $persistence->setBase64($schema->base64);
        $persistence->setContent($schema->value);

        return $persistence;
    }
}