<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Contracts;

/**
 * @template T
 */
interface ObjectFactoryInterface
{
    /**
     * @param array<non-negative-int, mixed> ...$arguments
     *
     * @return T
     */
    public function objectFor(array ...$arguments): mixed;
}
