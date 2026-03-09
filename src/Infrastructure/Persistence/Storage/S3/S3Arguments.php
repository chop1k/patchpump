<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\S3;

use App\Infrastructure\Persistence\Contracts\Request\ArgumentsInterface;
use Override;

/**
 * @psalm-import-type S3ArgumentsType from S3PsalmTypes as ArgumentsType
 *
 * @implements ArgumentsInterface<ArgumentsType>
 */
final readonly class S3Arguments implements ArgumentsInterface
{
    public function __construct(
        /**
         * @var ArgumentsType $arguments
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
