<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Shuffle;

use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Common\ArgumentsAssembly;
use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Common\ArgumentsFactory;
use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Common\Values;
use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Contracts\EnumerationInterface;
use Generator;

/**
 * @interal
 *
 * @psalm-internal App\Tests\Fuzzing\Common\Fuzzing\Shuffle
 */
final readonly class GenericShuffle
{
    public function __construct(
        private Values $values,
        private EnumerationInterface $enumeration,
    ) {
    }

    private function argumentAssembly(): ArgumentsAssembly
    {
        return new ArgumentsAssembly(
            $this->values->count(),
            $this->enumeration,
        );
    }

    private function argumentFactory(): ArgumentsFactory
    {
        return new ArgumentsFactory(
            $this->values->values(),
        );
    }

    /**
     * @return Generator<non-negative-int, array<non-negative-int, mixed>>
     */
    public function generator(): Generator
    {
        $assembly = $this->argumentAssembly();
        $factory = $this->argumentFactory();

        foreach ($assembly->generator() as $index => $arguments) {
            yield $index => $factory->arguments($arguments);
        }
    }
}
