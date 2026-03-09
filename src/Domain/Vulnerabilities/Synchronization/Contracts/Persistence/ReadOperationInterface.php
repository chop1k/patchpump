<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Contracts\Persistence;

use InvalidArgumentException;

/**
 * @template T
 */
interface ReadOperationInterface
{
    /**
     * @return T
     *
     * @throws InvalidArgumentException Not found
     */
    public function get(string $id): mixed;
}
