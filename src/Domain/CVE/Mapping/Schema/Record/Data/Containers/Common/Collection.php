<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Containers\Common;

/**
 * @template T
 * @template P
 */
final readonly class Collection
{
    public function __construct(
        /**
         * @var T[] $schema
         */
        private array $schema,
        /**
         * @var \Closure(T): P $factory
         */
        private \Closure $factory,
    ) {
    }

    public function toPersistence(): array
    {
    }
}
