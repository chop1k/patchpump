<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;

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

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Tags
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Tags(
            $this->providedBy,
            $this->tags,
        );
    }
}
