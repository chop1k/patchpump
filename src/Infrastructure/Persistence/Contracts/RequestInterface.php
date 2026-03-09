<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Contracts;

/**
 * @template T
 * @template K
 */
interface RequestInterface
{
    /**
     * @return T
     */
    public function template();

    /**
     * @return K
     */
    public function value();
}
