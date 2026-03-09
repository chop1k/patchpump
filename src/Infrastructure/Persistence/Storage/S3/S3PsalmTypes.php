<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\S3;

use Psr\Http\Message\StreamInterface;

/**
 * @psalm-type S3TemplateType = non-empty-string
 * @psalm-type S3ArgumentsType = non-empty-array<non-empty-string, mixed>
 * @psalm-type S3ParametersType = array<non-empty-string, non-empty-string>
 * @psalm-type S3ValueType = StreamInterface
 * @psalm-type S3ResultsType = array{
 *     bucket: non-empty-string,
 *     path: non-empty-string,
 * }
 */
final readonly class S3PsalmTypes
{
}
