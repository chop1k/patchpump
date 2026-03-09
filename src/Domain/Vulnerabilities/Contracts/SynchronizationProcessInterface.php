<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Contracts;

use Generator;

/**
 * @template T
 */
interface SynchronizationProcessInterface
{
    /**
     * @return Generator<non-negative-int, SynchronizationResultInterface<T>>
     */
    public function generator(): Generator;
}
