<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Taxonomy;

use App\Domain\CVE\Schema;
use Doctrine\Common\Collections\ArrayCollection;
use InvalidArgumentException;

/**
 * @internal
 */
final readonly class Mapping
{
    public function __construct(
        private Schema\TaxonomyMapping $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Taxonomy\Mapping
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Taxonomy\Mapping(
            $this->name(),
            $this->relations(),
            $this->schema->taxonomyVersion,
        );
    }

    private function name(): string
    {
        return $this->schema->taxonomyName ?? throw new InvalidArgumentException();
    }

    /**
     * @return ArrayCollection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Taxonomy\Relation>
     */
    private function relations(): ArrayCollection
    {
        if (null === $this->schema->taxonomyRelations) {
            throw new InvalidArgumentException();
        }

        $elements = array_map(
            static fn (Schema\TaxonomyRelation $node) => new Relation($node)->toPersistence(),
            array_values($this->schema->taxonomyRelations),
        );

        return new ArrayCollection($elements);
    }
}
