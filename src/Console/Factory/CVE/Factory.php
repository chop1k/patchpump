<?php

declare(strict_types=1);

namespace App\Console\Factory\CVE;

use App\Console\Enum\CVE\SourceType;
use App\Console\Input\CVE\SyncInput;
use App\Domain\CVE\Synchronization\Comparator\DateComparator;
use App\Domain\CVE\Synchronization\Persistence\DocumentPersistence;
use App\Domain\CVE\Synchronization\Source\ArchiveSource;
use App\Domain\CVE\Synchronization\Source\DirectorySource;
use App\Domain\CVE\Synchronization\Source\FileSource;
use App\Domain\CVE\Synchronization\Source\GuessSource;
use App\Domain\CVE\Synchronization\Source\RepositorySource;
use App\Domain\CVE\Synchronization\Source\StdinSource;
use App\Domain\Vulnerabilities\Synchronization\Contracts\ComparatorInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\PersistenceInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use App\Persistence\Document\CVE\Record;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final readonly class Factory
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator,
        private DocumentManager $documentManager,
        private SyncInput $input,
    ) {
    }

    /**
     * @return SourceInterface<Record>
     */
    public function source(): SourceInterface
    {
        $type = $this->input->sourceType();
        $records = $this->input->records();

        if (SourceType::Directory === $type) {
            return new DirectorySource(
                $this->serializer,
                $this->validator,
                $records,
            );
        } elseif (SourceType::Archive === $type) {
            return new ArchiveSource();
        } elseif (SourceType::Repository === $type) {
            return new RepositorySource();
        } elseif (SourceType::Stdin === $type) {
            return new StdinSource();
        } elseif (SourceType::File === $type) {
            return new FileSource();
        } else {
            return new GuessSource();
        }
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