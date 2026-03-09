<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Contracts\Persistence;

/**
 * @template T
 */
interface WriteOperationInterface
{
    /**
     * @param T $record
     */
    public function update(mixed $record): void;

    /**
     * @param T $record
     */
    public function create(mixed $record): void;
}
