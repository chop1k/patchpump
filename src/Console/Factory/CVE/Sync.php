<?php

declare(strict_types=1);

namespace App\Console\Factory\CVE;

use App\Console\Input\CVE as Input;
use App\Domain\CVE\Synchronization\Comparator;
use App\Domain\CVE\Synchronization\Persistence;
use App\Domain\CVE\Synchronization\Source;
use App\Domain\Vulnerabilities\Synchronization\Contracts;
use App\Persistence\Document\CVE\Record;
use Doctrine\Persistence\ObjectManager;
use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final readonly class Sync
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator,
        private ObjectManager $documentManager,
        private Input\Sync $input,
    ) {
    }

    /**
     * @return Contracts\SourceInterface<Record>
     *
     * @throws \InvalidArgumentException
     */
    public function source(): Contracts\SourceInterface
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

    private function directorySource(): Source\DirectorySource
    {
        return new Source\DirectorySource(
            $this->serializer,
            $this->validator,
            $this->rootFilesystem(),
            $this->input->records(),
        );
    }

    private function repositorySource(): Source\RepositorySource
    {
    }

    private function fileSource(): Source\FileSource
    {
        return new Source\FileSource(
            $this->serializer,
            $this->validator,
            $this->rootFilesystem(),
            $this->input->records(),
        );
    }

    private function stdinSource(): Source\StdinSource
    {
        return new Source\StdinSource(
            $this->serializer,
            $this->validator,
        );
    }

    /**
     * @return Contracts\ComparatorInterface<Record>
     */
    public function comparator(): Contracts\ComparatorInterface
    {
        return new Comparator\DateComparator();
    }

    /**
     * @return Contracts\PersistenceInterface<Record>
     */
    public function persistence(): Contracts\PersistenceInterface
    {
        return new Persistence\DocumentPersistence($this->documentManager);
    }
}
