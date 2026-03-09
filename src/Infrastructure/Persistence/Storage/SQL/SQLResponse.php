<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL;

use App\Infrastructure\Persistence\Contracts\ResponseInterface;
use Override;

/**
 * @implements ResponseInterface<array>
 */
final readonly class SQLResponse implements ResponseInterface
{
    public function __construct(
        private array $data,
    ) {
    }

    #[Override]
    public function results(): array
    {
        return $this->data;
    }
}
