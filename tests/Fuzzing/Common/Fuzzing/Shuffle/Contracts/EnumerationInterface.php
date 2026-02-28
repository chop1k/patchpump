<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Shuffle\Contracts;

use Generator;

/**
 * @interal
 *
 * @psalm-internal App\Tests\Fuzzing\Common\Fuzzing\Shuffle
 */
interface EnumerationInterface
{
    /**
     * @return Generator<non-negative-int, non-negative-int>
     */
    public function generator(): Generator;
}
