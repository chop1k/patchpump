<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL;

use App\Infrastructure\Persistence\Contracts\Request\TemplateInterface;
use League\Flysystem\FilesystemException;
use League\Flysystem\FilesystemOperator;
use Override;
use Symfony\Component\Filesystem\Path;

/**
 * @implements TemplateInterface<non-empty-string>
 */
final readonly class NoSQLTemplate implements TemplateInterface
{
    public function __construct(
        private FilesystemOperator $filesystem,
        private NoSQLName $name,
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
        $prefix = 'persistence/queries/nosql';

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
        return $this->filesystem->read(
            $this->path(
                $this->name->engine(),
                $this->name->floors(),
            ),
        );
    }
}
