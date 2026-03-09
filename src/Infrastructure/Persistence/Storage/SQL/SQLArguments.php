<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL;

use App\Infrastructure\Persistence\Contracts\Request\ArgumentsInterface;
use Override;

/**
 * @psalm-import-type SQLArgumentsType from SQLPsalmTypes as ArgumentsType
 *
 * @implements ArgumentsInterface<ArgumentsType>
 */
final readonly class SQLArguments implements ArgumentsInterface
{
    public function __construct(
        /**
         * @var ArgumentsType $arguments
         */
        private array $arguments = [],
    ) {
    }

    #[Override]
    public function arguments(): array
    {
        return $this->arguments;
    }
}
