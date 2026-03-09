<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Cache;

use App\Infrastructure\Persistence\Contracts\BridgeInterface;
use App\Infrastructure\Persistence\Contracts\RequestInterface;
use App\Infrastructure\Persistence\Contracts\ResponseInterface;
use League\Flysystem\FilesystemException;
use Override;

/**
 * @implements BridgeInterface<CacheRequest, CacheResponse>
 */
final readonly class CacheBridge implements BridgeInterface
{
    /**
     * @throws FilesystemException
     */
    #[Override]
    public function response(RequestInterface $request): ResponseInterface
    {
        $key = $request->template();
        $value = $request->value();
    }
}
