<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source;

use App\Domain\CVE\Synchronization\Source\Directory\Entry;
use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use App\Persistence\Document\CVE\Record;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
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
        private Filesystem $filesystem,
        /**
         * @var string[] $paths
         */
        private array $paths,
    ) {
    }

    /**
     * @return \Generator<Record>
     *
     * @throws FilesystemException
     */
    public function generator(): \Generator
    {
        foreach ($this->paths as $path) {
            yield from $this->innerGenerator($path);
        }
    }

    /**
     * @return \Generator<Record>
     *
     * @throws FilesystemException
     */
    private function innerGenerator(string $path): \Generator
    {
        foreach ($this->filesystem->listContents($path, deep: true) as $file) {
            $entry = new Entry(
                $this->serializer,
                $this->validator,
                $this->filesystem,
                $file,
            );

            if (false === $entry->valid()) {
                continue;
            }

            $record = $entry->toRecord()
                ->serialize()
                ->validate()
                ->toPersistence();

            yield $record->id() => $record;
        }
    }
}
