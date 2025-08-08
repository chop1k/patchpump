<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Reference
{
    public function __construct(
        private Schema\Reference $schema,
    ) {
    }

    public function toPersistence(): Persistence\Reference
    {
        $persistence = new Persistence\Reference();

        $persistence->setName($this->schema->name);
        $persistence->setUrl($this->schema->url);
        $persistence->setTags($this->schema->tags);

        return $persistence;
    }
}
