<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source\Directory;

use App\Domain\CVE\Synchronization\Source\Common\TextRecord;
use League\Flysystem\FileAttributes;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
use League\Flysystem\StorageAttributes;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @internal
 */
final readonly class Entry
{
    private const IdPattern = '/^CVE-\\d{4}-\\d{4,}$/';

    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator,
        private Filesystem $filesystem,
        private StorageAttributes $file,
    ) {
    }

    public function valid(): bool
    {
        if (!$this->file instanceof FileAttributes) {
            return false;
        }

        $path = $this->file->path();

        $name = Path::getFilenameWithoutExtension($path);
        $extension = Path::getExtension($path);

        return 'json' === $extension && preg_match(self::IdPattern, $name);
    }

    /**
     * @throws FilesystemException
     */
    public function toRecord(): TextRecord
    {
        $path = $this->file->path();

        return new TextRecord(
            $this->serializer,
            $this->validator,
            $this->filesystem->read($path),
        );
    }
}
