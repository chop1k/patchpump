<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Common;

/**
 * @interal
 *
 * @psalm-internal App\Tests\Fuzzing\Common\Fuzzing\Shuffle
 */
final readonly class Values
{
    public function __construct(
        /**
         * @var non-empty-array<non-negative-int, non-empty-array<non-negative-int, mixed>> $values
         */
        private array $values,
    ) {
    }

    /**
     * @return non-negative-int
     */
    public function count(): int
    {
        return count($this->values);
    }

    /**
     * @return non-empty-array<non-negative-int, non-negative-int>
     */
    public function limits(): array
    {
        return array_map('count', $this->values);
    }

    /**
     * @return non-empty-array<non-negative-int, non-empty-array<non-negative-int, mixed>>
     */
    public function values(): array
    {
        return $this->values;
    }
}
