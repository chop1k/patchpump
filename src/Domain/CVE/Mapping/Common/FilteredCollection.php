<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Common;

/**
 * @template S
 * @template P
 */
final readonly class FilteredCollection
{
    public function __construct(
        /**
         * @var list<S> $items
         */
        private array $items,
        /**
         * @var callable(S): P $mapper
         */
        private mixed $mapper,
    ) {
    }

    /**
     * @return MappedCollection<P>
     */
    public function map(): MappedCollection
    {
        return new MappedCollection(
            array_map($this->mapper, $this->items),
        );
    }
}
