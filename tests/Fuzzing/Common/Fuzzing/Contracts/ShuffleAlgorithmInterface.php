<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Contracts;

use Generator;

interface ShuffleAlgorithmInterface
{
    /**
     * @return Generator<non-negative-int, array<non-negative-int, mixed>>
     */
    public function generator(): Generator;
}
