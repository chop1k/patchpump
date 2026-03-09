<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Contracts;

/**
 * @template T
 */
interface SynchronizationResultInterface
{
    /**
     * @return T
     */
    public function record(): mixed;
}
