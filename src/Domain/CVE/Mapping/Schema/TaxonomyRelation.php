<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class TaxonomyRelation
{
    public function __construct(
        private Schema\TaxonomyRelation $schema,
    ) {
    }

    public function toPersistence(): Persistence\TaxonomyRelation
    {
        $persistence = new Persistence\TaxonomyRelation();

        $persistence->setId($this->schema->taxonomyId);
        $persistence->setName($this->schema->relationshipName);
        $persistence->setValue($this->schema->relationshipValue);

        return $persistence;
    }
}
