<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Contracts;

/**
 * @template T
 */
interface ResponseInterface
{
    /**
     * @return T
     */
    public function results();
}
