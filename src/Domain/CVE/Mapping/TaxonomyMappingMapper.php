<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final class TaxonomyMappingMapper
{
    public static function mapSchemaToPersistence(?Schema\TaxonomyMapping $schema): ?Persistence\TaxonomyMapping
    {
        if (null === $schema) {
            return null;
        }

        $persistence = new Persistence\TaxonomyMapping();

        $persistence->setVersion($schema->taxonomyVersion);
        $persistence->setName($schema->taxonomyName);

        if ($schema->taxonomyRelations !== null) {
            $persistence->setRelations(
                new ArrayCollection(
                    array_map(TaxonomyRelationMapper::mapSchemaToPersistence(...), $schema->taxonomyRelations),
                ),
            );
        }

        return $persistence;
    }
}