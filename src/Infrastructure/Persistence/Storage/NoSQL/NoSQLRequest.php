<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL;

use App\Infrastructure\Persistence\Contracts\RequestInterface;
use Override;

/**
 * @psalm-type NoSQLJson = array<non-empty-string, mixed>
 *
 * @implements RequestInterface<non-empty-array<non-empty-string, mixed>>
 */
final readonly class NoSQLRequest implements RequestInterface
{
    public function __construct(
        private NoSQLTemplate $template,
        private NoSQLArguments $arguments,
    ) {
    }

    #[Override]
    public function template()
    {
    }

    #[Override]
    public function value(): array
    {
    }
}
