<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Shuffle;

use App\Tests\Fuzzing\Common\Fuzzing\Contracts\ConfigurationInterface;
use App\Tests\Fuzzing\Common\Fuzzing\Contracts\ShuffleAlgorithmInterface;
use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Common\Values;
use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Contracts\EnumerationInterface;
use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Enumeration\OFATEnumeration;
use Generator;
use Override;

/**
 * @see https://en.wikipedia.org/wiki/One-factor-at-a-time_method
 */
final readonly class OFATShuffle implements ShuffleAlgorithmInterface
{
    public function __construct(
        private ConfigurationInterface $configuration,
    ) {
    }

    private function values(): Values
    {
        return new Values(
            $this->configuration->values(),
        );
    }

    private function enumerationFor(Values $values): EnumerationInterface
    {
        return new OFATEnumeration($values);
    }

    /**
     * @return Generator<non-negative-int, array<non-negative-int, mixed>>
     */
    #[Override]
    public function generator(): Generator
    {
        $values = $this->values();
        $enumeration = $this->enumerationFor($values);

        yield from new GenericShuffle($values, $enumeration)
            ->generator();
    }
}
