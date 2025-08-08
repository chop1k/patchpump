<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Common;

/**
 * @template S
 * @template P
 */
final readonly class ChaoticCollection
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
     * @param class-string<S> $class
     *
     * @return FilteredCollection<S, P>
     */
    public function ensureInstanceOf(string $class): FilteredCollection
    {
        $filter = static function (mixed $media) use ($class) {
            return is_object($media) && $class === get_class($media);
        };

        return new FilteredCollection(
            array_filter(
                $this->items,
                $filter,
            ),
            $this->mapper,
        );
    }
}
