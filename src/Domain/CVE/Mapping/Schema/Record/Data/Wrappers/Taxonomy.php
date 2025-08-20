<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\Taxonomy\Mapping as Wrapped;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Taxonomy
{
    public function __construct(
        private string $providedBy,
        private Schema\TaxonomyMapping $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Wrappers\Taxonomy
    {
        return new Persistence\Record\Data\Wrappers\Taxonomy(
            $this->providedBy,
            $this->mapping(),
        );
    }

    private function mapping(): Persistence\Taxonomy\Mapping
    {
        return (new Wrapped($this->schema))->toPersistence();
    }
}
