<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\RecordLocator;

use App\Domain\CVE\Synchronization\Contracts\RecordLocatorInterface;
use Symfony\Component\Filesystem\Path;

final class FileRecordLocator implements RecordLocatorInterface
{
    private bool $located = false;

    public function locateRecord(mixed $source): \Generator
    {
        if ($this->located) {
            yield null;
        }

        if (!is_string($source)) {
            throw new \InvalidArgumentException('Source should be a string.');
        }

        if (!is_file($source)) {
            throw new \InvalidArgumentException('Source file does not exist.');
        }

        $extension = Path::getExtension($source);

        if ($extension !== 'json') {
            throw new \InvalidArgumentException('Source file should be json.');
        }

        try {
            yield file_get_contents($source);
        } finally {
            $this->located = true;
        }
    }
}