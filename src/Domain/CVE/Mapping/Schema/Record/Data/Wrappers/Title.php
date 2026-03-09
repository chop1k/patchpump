<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

final readonly class Title
{
    public function __construct(
        private string $providedBy,
        private string $value,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Title
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Title(
            $this->providedBy,
            $this->value,
        );
    }
}
