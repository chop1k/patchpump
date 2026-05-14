<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL\Contracts\SQLRequest;

/**
 * @template T
 */
interface SQLArgumentsInterface
{
    /**
     * @return T
     */
    public function arguments();
}
