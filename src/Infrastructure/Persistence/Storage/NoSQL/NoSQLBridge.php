<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL;

use App\Infrastructure\Persistence\Contracts\BridgeInterface;
use App\Infrastructure\Persistence\Contracts\RequestInterface;
use App\Infrastructure\Persistence\Contracts\ResponseInterface;
use Override;

/**
 * @implements BridgeInterface<NoSQLRequest, NoSQLResponse>
 */
final readonly class NoSQLBridge implements BridgeInterface
{
    #[Override]
    public function response(RequestInterface $request): ResponseInterface
    {
    }
}
