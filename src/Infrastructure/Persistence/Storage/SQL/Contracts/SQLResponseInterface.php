<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL\Contracts;

/**
 * @template T
 */
interface SQLResponseInterface
{
    /**
     * @return T
     */
    public function results();
}
