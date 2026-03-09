<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Contracts\Request;

/**
 * @template T
 */
interface ArgumentsInterface
{
    /**
     * @return T
     */
    public function arguments();
}
