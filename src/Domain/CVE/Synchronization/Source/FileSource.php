<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source;

use App\Domain\CVE\Synchronization\Source\Common\TextRecord;
use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use App\Persistence\Document\CVE\Record;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @implements SourceInterface<Record>
 */
final readonly class FileSource implements SourceInterface
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
     * @return \Generator<string, Record>
     *
     * @throws FilesystemException
     */
    public function generator(): \Generator
    {
        foreach ($this->paths as $path) {
            $text = $this->filesystem->read($path);

            $record = new TextRecord(
                $this->serializer,
                $this->validator,
                $text,
            );

            $record = $record
                ->serialize()
                ->validate()
                ->toPersistence();

            yield $record->getId() => $record;
        }
    }
}
