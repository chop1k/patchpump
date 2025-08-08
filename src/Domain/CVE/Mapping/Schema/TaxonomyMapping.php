<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Common\ChaoticCollection;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class TaxonomyMapping
{
    public function __construct(
        private Schema\TaxonomyMapping $schema,
    ) {
    }

    public function toPersistence(): Persistence\TaxonomyMapping
    {
        $persistence = new Persistence\TaxonomyMapping();

        $persistence->setVersion($this->schema->taxonomyVersion);
        $persistence->setName($this->schema->taxonomyName);

        if (null !== $this->schema->taxonomyRelations) {
            $relations = new ChaoticCollection(
                $this->schema->taxonomyRelations,
                $this->mapRelation(...),
            );

            $relations = $relations
                ->ensureInstanceOf(Schema\TaxonomyRelation::class)
                ->map()
                ->toArrayCollection();

            $persistence->setRelations($relations);
        }

        return $persistence;
    }

    private function mapRelation(Schema\TaxonomyRelation $relation): Persistence\TaxonomyRelation
    {
        $mapping = new TaxonomyRelation($relation);

        return $mapping->toPersistence();
    }
}
