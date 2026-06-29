<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Testing;

use App\Tests\Fuzzing\Common\Fuzzing\Fuzzing;
use Generator;
use IteratorAggregate;
use Override;

/**
 * @template T
 *
 * @implements IteratorAggregate<non-negative-int, array{0: T}>
 */
final readonly class FuzzingToProviderAdapter implements IteratorAggregate
{
    public function __construct(
        /**
         * @var Fuzzing<T> $fuzzing
         */
        private Fuzzing $fuzzing,
    ) {
    }

    /**
     * @return Generator<non-negative-int, array{0: T}>
     */
    #[Override]
    public function getIterator(): Generator
    {
        foreach ($this->fuzzing->generator() as $key => $item) {
            yield $key => [$item];
        }
    }
}
