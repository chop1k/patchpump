<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Taxonomy;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

/**
 * @internal
 */
final readonly class Relation
{
    public function __construct(
        private Schema\TaxonomyRelation $schema,
    ) {
    }

    public function toPersistence(): Persistence\Taxonomy\Relation
    {
        return new Persistence\Taxonomy\Relation(
            $this->schema->taxonomyId,
            $this->schema->relationshipName,
            $this->schema->relationshipValue,
        );
    }
}
