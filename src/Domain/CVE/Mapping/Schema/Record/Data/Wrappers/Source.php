<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Persistence\Document\CVE as Persistence;

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

    public function toPersistence(): Persistence\Record\Data\Wrappers\Source
    {
        return new Persistence\Record\Data\Wrappers\Source(
            $this->providedBy,
            $this->data,
        );
    }
}
