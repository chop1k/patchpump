<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;

final class TaxonomyRelationMapper
{
    public static function mapSchemaToPersistence(?Schema\TaxonomyRelation $schema): ?Persistence\TaxonomyRelation
    {
        if (null === $schema) {
            return null;
        }

        $persistence = new Persistence\TaxonomyRelation();

        $persistence->setId($schema->taxonomyId);
        $persistence->setName($schema->relationshipName);
        $persistence->setValue($schema->relationshipValue);

        return $persistence;
    }
}