<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Persistence\Document\CVE as Persistence;

final readonly class Title
{
    public function __construct(
        private string $providedBy,
        private string $value,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Wrappers\Title
    {
        return new Persistence\Record\Data\Wrappers\Title(
            $this->providedBy,
            $this->value,
        );
    }
}
