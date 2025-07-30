<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source;

use App\Domain\CVE\Synchronization\Source\Directory\DirectoryIteration;
use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use App\Persistence\Document\CVE\Record;
use League\Flysystem\FileAttributes;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @implements SourceInterface<Record>
 */
final readonly class DirectorySource implements SourceInterface
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator,
        /**
         * @var string[] $paths
         */
        private array $paths,
    ) {
    }

    private function filesystem(string $path): Filesystem
    {
        if (!is_dir($path)) {
            throw new \InvalidArgumentException('Source directory does not exist.');
        }

        return new Filesystem(
            new LocalFilesystemAdapter(
                $path,
            ),
        );
    }

    private function iteration(string $path): DirectoryIteration
    {
        return new DirectoryIteration(
            $this->serializer,
            $this->validator,
            $path,
        );
    }

    /**
     * @throws FilesystemException
     *
     * @return \Generator<Record>
     */
    public function generator(): \Generator
    {
        foreach ($this->paths as $path) {
            $filesystem = $this->filesystem($path);

            yield from $this->innerGenerator($filesystem);
        }
    }
    /**
     * @throws FilesystemException
     *
     * @return \Generator<Record>
     */
    private function innerGenerator(Filesystem $filesystem): \Generator
    {
        foreach ($filesystem->listContents('', deep: true) as $file) {
            if (!$file instanceof FileAttributes) {
                continue;
            }

            $path = $file->path();

            $iteration = $this->iteration($path);

            if ($iteration->valid() === false) {
                continue;
            }

            $record = $iteration->record($filesystem->read($path));

            if ($record->valid() === false) {
                continue;
            }

            yield $record->id() => $record->record();
        }
    }
}
