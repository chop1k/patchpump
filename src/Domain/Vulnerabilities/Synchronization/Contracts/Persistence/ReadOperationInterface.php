<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Contracts\Persistence;

/**
 * @template T
 */
interface ReadOperationInterface
{
    /**
     * @throws \InvalidArgumentException Not found
     *
     * @return T
     */
    public function get(string $id): mixed;
}