<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\S3;

use App\Infrastructure\Persistence\Contracts\BridgeInterface;
use App\Infrastructure\Persistence\Contracts\RequestInterface;
use App\Infrastructure\Persistence\Contracts\ResponseInterface;
use Override;

/**
 * @implements BridgeInterface<S3Request, S3Response>
 */
final readonly class S3Bridge implements BridgeInterface
{
    public function __construct(
    ) {
    }

    #[Override]
    public function response(RequestInterface $request): ResponseInterface
    {
        $path = $request->template();
        $stream = $request->value();
    }
}
