<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Enumeration;

use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Common\Values;
use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Contracts\EnumerationInterface;
use Generator;
use Override;

/**
 * @interal
 *
 * @psalm-internal App\Tests\Fuzzing\Common\Fuzzing\Shuffle
 *
 * @see https://en.wikipedia.org/wiki/One-factor-at-a-time_method
 */
final readonly class OFATEnumeration implements EnumerationInterface
{
    public function __construct(
        private Values $values,
    ) {
    }

    /**
     * @return Generator<non-negative-int, non-negative-int>
     */
    #[Override]
    public function generator(): Generator
    {
        for ($i = 0; $i < $this->values->count(); ++$i) {
            for ($j = 1; $j < $this->values->limits()[$i]; ++$j) {
                $combination = array_fill(0, $this->values->count(), 0);

                $combination[$i] = $j;

                foreach ($combination as $index) {
                    yield $index;
                }
            }
        }
    }
}
