<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Taxonomy;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @internal
 */
final readonly class Mapping
{
    public function __construct(
        private Schema\TaxonomyMapping $schema,
    ) {
    }

    public function toPersistence(): Persistence\Taxonomy\Mapping
    {
        return new Persistence\Taxonomy\Mapping(
            $this->schema->taxonomyName,
            $this->relations(),
            $this->schema->taxonomyVersion,
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Taxonomy\Relation>
     */
    private function relations(): ArrayCollection
    {
        $elements = array_map(
            static fn (Schema\TaxonomyRelation $node) => (new Relation($node))->toPersistence(),
            $this->schema->taxonomyRelations,
        );

        return new ArrayCollection($elements);
    }
}
