<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL;

/**
 * @psalm-type SQLTemplateType = non-empty-string
 * @psalm-type SQLArgumentType = integer|float|string|null
 * @psalm-type SQLArgumentsType = array<non-empty-string, SQLArgumentType>
 * @psalm-type SQLValueType = SQLArgumentsType
 */
final readonly class SQLPsalmTypes
{
}
