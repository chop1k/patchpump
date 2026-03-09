<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\S3;

/**
 * @psalm-import-type S3ArgumentsType from S3PsalmTypes as ArgumentsType
 * @psalm-import-type S3ParametersType from S3PsalmTypes as ParametersType
 */
final readonly class S3Parameters
{
    public function __construct(
        /**
         * @var ArgumentsType $arguments
         */
        private array $arguments,
    ) {
    }

    /**
     * @param non-empty-string $key
     */
    private static function filter(string $key): bool
    {
        return 'stream' !== $key;
    }

    /**
     * @return ParametersType
     */
    public function parameters(): array
    {
        return array_filter(
            $this->arguments,
            self::filter(...),
        );
    }
}
