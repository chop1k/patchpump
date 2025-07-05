<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final class TaxonomyMappingMapper
{
    public static function mapSchemaToPersistence(Schema\TaxonomyMapping $schema): Persistence\TaxonomyMapping
    {
        $persistence = new Persistence\TaxonomyMapping();

        $persistence->setVersion($schema->taxonomyVersion);
        $persistence->setName($schema->taxonomyName);

        if ($schema->taxonomyRelations !== null) {
            $filtered = array_filter(
                $schema->taxonomyRelations,
                static fn (mixed $rel) => is_object($rel) && get_class($rel) === Schema\TaxonomyRelation::class,
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