<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Domain\CVE\Mapping\Schema\Common\Description as Wrapped;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

final readonly class Description
{
    public function __construct(
        private string $providedBy,
        private Schema\Description $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Wrappers\Description
    {
        return new Persistence\Record\Data\Wrappers\Description(
            $this->providedBy,
            $this->description(),
        );
    }

    private function description(): Persistence\Common\Description\Description
    {
        return (new Wrapped($this->schema))->toPersistence();
    }
}
