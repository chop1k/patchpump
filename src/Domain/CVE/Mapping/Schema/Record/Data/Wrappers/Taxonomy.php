<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\Taxonomy\Mapping as Wrapped;
use App\Domain\CVE\Schema;

final readonly class Taxonomy
{
    public function __construct(
        private string $providedBy,
        private Schema\TaxonomyMapping $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Taxonomy
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Taxonomy(
            $this->providedBy,
            $this->mapping(),
        );
    }

    private function mapping(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Taxonomy\Mapping
    {
        return new Wrapped($this->schema)->toPersistence();
    }
}
