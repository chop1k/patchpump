<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Cache;

use App\Infrastructure\Persistence\Contracts\ResponseInterface;
use Override;

/**
 * @implements ResponseInterface<string>
 */
final readonly class CacheResponse implements ResponseInterface
{
    #[Override]
    public function results(): string
    {
    }
}
