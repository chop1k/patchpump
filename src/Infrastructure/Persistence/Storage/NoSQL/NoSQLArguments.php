<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL;

use App\Infrastructure\Persistence\Contracts\Request\ArgumentsInterface;
use Override;

/**
 * @psalm-type NoSQLArray = array<non-empty-string, mixed>
 *
 * @implements ArgumentsInterface<NoSQLArray>
 */
final readonly class NoSQLArguments implements ArgumentsInterface
{
    public function __construct(
        /**
         * @var NoSQLArray $arguments
         */
        private array $arguments,
    ) {
    }

    #[Override]
    public function arguments(): array
    {
        return $this->arguments;
    }
}
