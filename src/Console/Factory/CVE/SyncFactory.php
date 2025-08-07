<?php

declare(strict_types=1);

namespace App\Console\Factory\CVE;

use App\Console\Enum\CVE\SourceType;
use App\Domain\CVE\Synchronization\Comparator\DateComparator;
use App\Domain\CVE\Synchronization\Persistence\DocumentPersistence;
use App\Domain\CVE\Synchronization\Source\DirectorySource;
use App\Domain\CVE\Synchronization\Source\FileSource;
use App\Domain\CVE\Synchronization\Source\RepositorySource;
use App\Domain\CVE\Synchronization\Source\StdinSource;
use App\Domain\Vulnerabilities\Synchronization\Contracts\ComparatorInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\PersistenceInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use App\Persistence\Document\CVE\Record;
use Doctrine\Persistence\ObjectManager;
use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final readonly class SyncFactory
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator,
        private ObjectManager $documentManager,
    ) {
    }

    /**
     * @param string[] $records
     *
     * @return SourceInterface<Record>
     *
     * @throws \InvalidArgumentException
     */
    public function source(SourceType $type, array $records): SourceInterface
    {
        return match ($type) {
            SourceType::Directory => $this->directorySource($records),
            SourceType::Repository => $this->repositorySource(),
            SourceType::Stdin => $this->stdinSource(),
            SourceType::File => $this->fileSource($records),
        };
    }

    private function rootFilesystem(): Filesystem
    {
        return new Filesystem(
            new LocalFilesystemAdapter('/'),
        );
    }

    private function directorySource(array $paths): DirectorySource
    {
        return new DirectorySource(
            $this->serializer,
            $this->validator,
            $this->rootFilesystem(),
            $paths,
        );
    }

    private function repositorySource(): RepositorySource
    {
    }

    private function fileSource(array $paths): FileSource
    {
        return new FileSource(
            $this->serializer,
            $this->validator,
            $this->rootFilesystem(),
            $paths,
        );
    }

    private function stdinSource(): StdinSource
    {
        return new StdinSource(
            $this->serializer,
            $this->validator,
        );
    }

    /**
     * @return ComparatorInterface<Record>
     */
    public function comparator(): ComparatorInterface
    {
        return new DateComparator();
    }

    /**
     * @return PersistenceInterface<Record>
     */
    public function persistence(): PersistenceInterface
    {
        return new DocumentPersistence($this->documentManager);
    }
}
