<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Contracts;

/**
 * @template T
 */
interface ComparatorInterface
{
    /**
     * @param T $old
     * @param T $new
     */
    public function newer(mixed $old, mixed $new): bool;
}
