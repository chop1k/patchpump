<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

final readonly class Source
{
    public function __construct(
        private string $providedBy,
        /**
         * @var array<string, mixed> $data
         */
        private array $data,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Source
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Source(
            $this->providedBy,
            $this->data,
        );
    }
}
