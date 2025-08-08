<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Common;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @template T
 */
final readonly class MappedCollection
{
    public function __construct(
        /**
         * @var list<T> $items
         */
        private array $items,
    ) {
    }

    public function toArray(): array
    {
        return $this->items;
    }

    /**
     * @return ArrayCollection<T>
     */
    public function toArrayCollection(): ArrayCollection
    {
        return new ArrayCollection($this->items);
    }
}
