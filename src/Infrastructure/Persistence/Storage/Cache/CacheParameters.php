<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Cache;

/**
 * @psalm-import-type CacheArgumentsArray from CacheArguments
 *
 * @psalm-type CacheParametersArray = array<non-empty-string, non-empty-string>
 */
final readonly class CacheParameters
{
    public function __construct(
        /**
         * @var CacheArgumentsArray $arguments
         */
        private array $arguments,
    ) {
    }

    /**
     * @param non-empty-string $key
     */
    private static function filter(string $key): bool
    {
        return 'value' !== $key;
    }

    /**
     * @return CacheParametersArray
     */
    public function parameters(): array
    {
        return array_filter(
            $this->arguments,
            self::filter(...),
        );
    }
}
