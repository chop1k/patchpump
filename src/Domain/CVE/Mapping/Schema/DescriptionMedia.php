<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class DescriptionMedia
{
    public function __construct(
        private Schema\DescriptionMedia $schema,
    ) {
    }

    public function toPersistence(): Persistence\DescriptionMedia
    {
        $persistence = new Persistence\DescriptionMedia();

        $persistence->setType($this->schema->type);
        $persistence->setBase64($this->schema->base64);
        $persistence->setContent($this->schema->value);

        return $persistence;
    }
}
