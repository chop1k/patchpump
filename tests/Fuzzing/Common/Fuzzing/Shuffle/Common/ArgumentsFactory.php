<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Common;

/**
 * @interal
 *
 * @psalm-internal App\Tests\Fuzzing\Common\Fuzzing\Shuffle
 */
final readonly class ArgumentsFactory
{
    public function __construct(
        /**
         * @var non-empty-array<non-negative-int, non-empty-array<non-negative-int, mixed>> $values
         */
        private array $values,
    ) {
    }

    /**
     * @todo refactor
     *
     * @param array<non-negative-int, non-negative-int> $keys
     *
     * @return array<non-negative-int, mixed>
     */
    public function arguments(array $keys): array
    {
        /**
         * @var non-empty-array<non-negative-int, mixed> $arguments
         */
        $arguments = [];

        for ($i = 0; $i < count($this->values); ++$i) {
            $arguments[] = $this->values[$i][$keys[$i]];
        }

        return $arguments;
    }
}
