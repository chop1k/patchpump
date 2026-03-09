<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Contracts;

/**
 * @template T of RequestInterface
 * @template K of ResponseInterface
 */
interface BridgeInterface
{
    /**
     * @param T $request
     *
     * @return K
     */
    public function response(RequestInterface $request): ResponseInterface;
}
