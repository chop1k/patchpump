<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing;

use App\Tests\Fuzzing\Common\Fuzzing\Contracts\ObjectFactoryInterface;
use App\Tests\Fuzzing\Common\Fuzzing\Contracts\ShuffleAlgorithmInterface;
use Generator;

/**
 * @template T
 */
final readonly class Fuzzing
{
    public function __construct(
        private ShuffleAlgorithmInterface $shuffleAlgorithm,
        /**
         * @var ObjectFactoryInterface<T> $objectFactory
         */
        private ObjectFactoryInterface $objectFactory,
    ) {
    }

    /**
     * @return Generator<non-negative-int, T>
     */
    public function generator(): Generator
    {
        foreach ($this->shuffleAlgorithm->generator() as $index => $arguments) {
            /*
             * @psalm-trace $arguments
             */
            yield $index => $this->objectFactory->objectFor(...$arguments);
        }
    }
}
