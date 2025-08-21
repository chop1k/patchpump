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
            $this->id(),
            $this->name(),
            $this->value(),
        );
    }

    private function id(): string
    {
        return $this->schema->taxonomyId ?? throw new \InvalidArgumentException();
    }

    private function name(): string
    {
        return $this->schema->relationshipName ?? throw new \InvalidArgumentException();
    }

    private function value(): string
    {
        return $this->schema->relationshipValue ?? throw new \InvalidArgumentException();
    }
}
