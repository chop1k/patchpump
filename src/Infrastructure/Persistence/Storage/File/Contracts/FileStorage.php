<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\File\Contracts;

interface FileStorage
{
    public function file(): File;

    public function withFile(File $file): self;
}
