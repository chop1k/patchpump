<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Contracts;

interface ConfigurationInterface
{
    /**
     * @return non-empty-array<non-negative-int, string>
     */
    public function fields(): array;

    /**
     * @return non-empty-array<non-negative-int, non-empty-array<non-negative-int, mixed>>
     */
    public function values(): array;
}
