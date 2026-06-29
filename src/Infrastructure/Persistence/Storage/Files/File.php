<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Files;

use League\Flysystem\Filesystem;
use Symfony\Component\Filesystem\Path;

final readonly class File
{
    public function __construct(
        private Filesystem $filesystem,
        public string $directory,
        public string $name,
    ) {
    }

    public function data(): string
    {
        $path = Path::join($this->directory, $this->name);

        return $this->filesystem->read($path);
    }

    public function remove(): void
    {
        $path = Path::join($this->directory, $this->name);

        return $this->filesystem->delete($path);
    }
}
