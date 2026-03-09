<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Contracts;

use App\Infrastructure\Persistence\Contracts\Request\ArgumentsInterface;
use App\Infrastructure\Persistence\Contracts\Request\NameInterface;

/**
 * @template T of NameInterface
 * @template N of ArgumentsInterface
 * @template K of ResponseInterface
 */
interface PersistenceInterface
{
    /**
     * @param T $name
     * @param N $arguments
     *
     * @return K
     */
    public function response(NameInterface $name, ArgumentsInterface $arguments): ResponseInterface;
}
