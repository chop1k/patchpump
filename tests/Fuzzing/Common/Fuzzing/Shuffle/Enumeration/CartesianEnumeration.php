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
 * @see https://en.wikipedia.org/wiki/Cartesian_product
 */
final readonly class CartesianEnumeration implements EnumerationInterface
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
        $indices = array_fill(0, $this->values->count(), 0);

        $index = 0;

        while (true) {
            for ($i = 0; $i < $this->values->count(); ++$i) {
                yield $index => $indices[$i];
                ++$index;
            }

            for ($j = $this->values->count() - 1; $j >= 0; --$j) {
                ++$indices[$j];

                if ($indices[$j] < $this->values->limits()[$j]) {
                    break;
                }

                $indices[$j] = 0;

                if (0 === $j) {
                    return;
                }
            }
        }
    }

    //    /**
    //     * @return Generator<non-negative-int, non-negative-int>
    //     */
    //    #[Override]
    //    public function generator(): Generator
    //    {
    //        $numberOfLimits = count($this->limits);
    //        $algorithm = new SequentialCarryAlgorithm($this->limits);
    //
    //        $indices = array_fill(0, $numberOfLimits, 0);
    //
    //        $index = 0;
    //        $counter = $numberOfLimits;
    //
    //        while (true) {
    //            ++$index;
    //            --$counter;
    //
    //            yield $index => $indices[$counter];
    //
    //            if (0 === $counter) {
    //                if (array_sum($indices) + $numberOfLimits === array_sum($this->limits)) {
    //                    break;
    //                }
    //
    //                for ($i = $numberOfLimits - 1; $i >= 0; --$i) {
    //                    if ($this->limits[$i] - 1 === $indices[$i]) {
    //                        $indices[$i] = 0;
    //
    //                        continue;
    //                    }
    //
    //                    ++$indices[$i];
    //
    //                    break;
    //                }
    //
    //                $counter = $numberOfLimits;
    //            }
    //        }
    //    }
}
