<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Common\Description;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

/**
 * @internal
 */
final readonly class Media
{
    public function __construct(
        private Schema\DescriptionMedia $schema,
    ) {
    }

    public function toPersistence(): Persistence\Common\Description\Media
    {
        return new Persistence\Common\Description\Media(
            $this->schema->type,
            $this->schema->value,
            $this->schema->base64
        );
    }
}
