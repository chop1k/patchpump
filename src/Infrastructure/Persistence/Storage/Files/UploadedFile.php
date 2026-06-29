<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\Files;

use League\Flysystem\Filesystem;
use Symfony\Component\Filesystem\Path;

final readonly class UploadedFile
{
    public function __construct(
        private Filesystem $filesystem,
        public string $directory,
        public string $name,
        public string $data,
    ) {
    }

    public function save(): void
    {
        $path = Path::join($this->directory, $this->name);

        return $this->filesystem->write($path, $this->data);
    }
}
