<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Cache;

use App\Infrastructure\Persistence\Contracts\Request\NameInterface;
use App\Infrastructure\Persistence\Contracts\Request\TemplateInterface;
use League\Flysystem\FilesystemException;
use League\Flysystem\FilesystemOperator;
use Override;
use Symfony\Component\Filesystem\Path;

/**
 * @psalm-type CacheTemplateString = non-empty-string
 *
 * @implements TemplateInterface<CacheTemplateString>
 */
final readonly class CacheTemplate implements TemplateInterface
{
    public function __construct(
        private FilesystemOperator $filesystem,
        private NameInterface $name,
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
        $prefix = 'persistence/queries/cache';

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
