<?php

declare(strict_types=1);

namespace App\Console\Factory\CVE;

use App\Console\Input\CVE\SyncInput;
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
        private SyncInput $input,
    ) {
    }

    /**
     * @return SourceInterface<Record>
     *
     * @throws \InvalidArgumentException
     */
    public function source(): SourceInterface
    {
        $source = $this->input->source();

        if (true === $source->directorySelected()) {
            return $this->directorySource();
        }

        if (true === $source->repositorySelected()) {
            return $this->repositorySource();
        }

        if (true === $source->fileSelected()) {
            return $this->fileSource();
        }

        if (true === $source->stdinSelected()) {
            return $this->stdinSource();
        }

        throw new \InvalidArgumentException();
    }

    private function rootFilesystem(): Filesystem
    {
        return new Filesystem(
            new LocalFilesystemAdapter('/'),
        );
    }

    private function directorySource(): DirectorySource
    {
        return new DirectorySource(
            $this->serializer,
            $this->validator,
            $this->rootFilesystem(),
            $this->input->records(),
        );
    }

    private function repositorySource(): RepositorySource
    {
    }

    private function fileSource(): FileSource
    {
        return new FileSource(
            $this->serializer,
            $this->validator,
            $this->rootFilesystem(),
            $this->input->records(),
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
