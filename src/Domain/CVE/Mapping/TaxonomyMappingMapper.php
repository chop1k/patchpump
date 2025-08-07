<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final class TaxonomyMappingMapper
{
    public static function mapSchemaToPersistence(Schema\TaxonomyMapping $schema): Persistence\TaxonomyMapping
    {
        $persistence = new Persistence\TaxonomyMapping();

        $persistence->setVersion($schema->taxonomyVersion);
        $persistence->setName($schema->taxonomyName);

        if (null !== $schema->taxonomyRelations) {
            $filtered = array_filter(
                $schema->taxonomyRelations,
                static fn (mixed $rel) => is_object($rel) && Schema\TaxonomyRelation::class === get_class($rel),
            );

            $persistence->setRelations(
                new ArrayCollection(
                    array_map(TaxonomyRelationMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        return $persistence;
    }
}
