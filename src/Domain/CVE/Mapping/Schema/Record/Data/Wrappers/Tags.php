<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

use App\Persistence\Document\CVE as Persistence;

final readonly class Tags
{
    public function __construct(
        private string $providedBy,
        /**
         * @var string[] $tags
         */
        private array $tags,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Wrappers\Tags
    {
        return new Persistence\Record\Data\Wrappers\Tags(
            $this->providedBy,
            $this->tags,
        );
    }
}
