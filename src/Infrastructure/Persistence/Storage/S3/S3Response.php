<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\S3;

use App\Infrastructure\Persistence\Contracts\ResponseInterface;
use Override;

/**
 * @psalm-import-type S3ResultsType from S3PsalmTypes as ResultsType
 *
 * @implements ResponseInterface<ResultsType>
 */
final readonly class S3Response implements ResponseInterface
{
    public function __construct(
        /**
         * @var non-empty-string $bucket
         */
        private string $bucket,
        /**
         * @var non-empty-string $path
         */
        private string $path,
    ) {
    }

    #[Override]
    public function results(): array
    {
        return [
            'bucket' => $this->bucket,
            'path' => $this->path,
        ];
    }
}
