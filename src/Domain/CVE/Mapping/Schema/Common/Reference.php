<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Common;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

/**
 * @internal
 */
final readonly class Reference
{
    public function __construct(
        private Schema\Reference $schema,
    ) {
    }

    public function toPersistence(): Persistence\Common\Reference
    {
        return new Persistence\Common\Reference(
            $this->schema->url,
            $this->schema->name,
            $this->schema->tags,
        );
    }
}
