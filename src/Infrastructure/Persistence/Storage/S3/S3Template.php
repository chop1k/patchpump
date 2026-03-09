<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\S3;

use App\Infrastructure\Persistence\Contracts\Request\TemplateInterface;
use League\Flysystem\FilesystemException;
use League\Flysystem\FilesystemOperator;
use Override;
use Symfony\Component\Filesystem\Path;

/**
 * @psalm-import-type S3TemplateType from S3PsalmTypes as TemplateType
 *
 * @implements TemplateInterface<TemplateType>
 */
final readonly class S3Template implements TemplateInterface
{
    public function __construct(
        private FilesystemOperator $filesystem,
        private S3Name $name,
    ) {
    }

    /**
     * @param non-empty-string                                    $engine
     * @param non-empty-array<non-negative-int, non-empty-string> $floors
     *
     * @return non-empty-string
     */
    private function path(string $engine, array $floors): string
    {
        $prefix = 'persistence/queries/s3';

        return Path::join(
            $prefix,
            $engine,
            ...$floors,
        );
    }

    /**
     * @throws FilesystemException
     */
    #[Override]
    public function value(): string
    {
        $path = $this->path(
            $this->name->engine(),
            $this->name->floors(),
        );

        return $this->filesystem->read($path);
    }
}
