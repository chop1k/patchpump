<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL;

use App\Infrastructure\Persistence\Contracts\ResponseInterface;
use Override;

/**
 * @implements ResponseInterface<array>
 */
final readonly class NoSQLResponse implements ResponseInterface
{
    #[Override]
    public function results(): array
    {
    }
}
