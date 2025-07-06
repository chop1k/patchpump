<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\RecordLocator;

use App\Domain\CVE\Synchronization\Contracts\RecordLocatorInterface;
use League\Flysystem\FileAttributes;
use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Symfony\Component\Filesystem\Path;

final class DirectoryRecordLocator implements RecordLocatorInterface
{
    public function locateRecord(mixed $source): \Generator
    {
        if (!is_string($source)) {
            throw new \InvalidArgumentException('Source should be a string.');
        }

        if (!is_dir($source)) {
            throw new \InvalidArgumentException('Source directory does not exist.');
        }

        $filesystem = new Filesystem(
            new LocalFilesystemAdapter(
                $source,
            )
        );

        return $this->locateRecordsInSubdirectories($filesystem);
    }

    private function locateRecordsInSubdirectories(Filesystem $filesystem): \Generator
    {
        foreach ($filesystem->listContents('', true) as $file) {
            if (!$file instanceof FileAttributes) {
                continue;
            }

            $path = $file->path();

            $extension = Path::getExtension($path);

            if ($extension !== 'json') {
                continue;
            }

            $name = Path::getFilenameWithoutExtension($path);

            $match = preg_match('/^CVE-\\d{4}-\\d{4,}$/', $name);

            if ($match) {
                yield $filesystem->read($path);
            }
        }

        yield null;
    }
}