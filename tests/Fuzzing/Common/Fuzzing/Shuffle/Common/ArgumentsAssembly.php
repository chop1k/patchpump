<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Common;

use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Contracts\EnumerationInterface;
use Generator;

/**
 * @interal
 *
 * @psalm-internal App\Tests\Fuzzing\Common\Fuzzing\Shuffle
 */
final readonly class ArgumentsAssembly
{
    public function __construct(
        /**
         * @var non-negative-int $limit
         */
        private int $limit,
        private EnumerationInterface $enumeration,
    ) {
    }

    /**
     * @todo refactor
     *
     * @return Generator<non-negative-int, array<non-negative-int, non-negative-int>>
     */
    public function generator(): Generator
    {
        $arguments = [];

        $key = 0;

        foreach ($this->enumeration->generator() as $index) {
            $arguments[] = $index;

            if (count($arguments) === $this->limit) {
                yield $key => $arguments;

                $arguments = [];
                ++$key;
            }
        }
    }
}
