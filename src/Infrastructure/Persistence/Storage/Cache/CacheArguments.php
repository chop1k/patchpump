<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Cache;

use App\Infrastructure\Persistence\Contracts\Request\ArgumentsInterface;
use Override;

/**
 * @psalm-import-type CacheValueString from CacheValue
 *
 * @psalm-type CacheArgumentsArray = array<non-empty-string, string>
 *
 * @implements ArgumentsInterface<CacheArgumentsArray>
 */
final readonly class CacheArguments implements ArgumentsInterface
{
    public function __construct(
        /**
         * @var CacheArgumentsArray $arguments
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
