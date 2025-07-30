<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Persistence;

use App\Domain\Vulnerabilities\Synchronization\Contracts\PersistenceInterface;
use App\Persistence\Document\CVE\Record;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\LockException;
use Doctrine\ODM\MongoDB\Mapping\MappingException;
use Doctrine\ODM\MongoDB\MongoDBException;

/**
 * @implements PersistenceInterface<Record>
 */
final readonly class DocumentPersistence implements PersistenceInterface
{
    public function __construct(
        private DocumentManager $documentManager,
    ) {
    }

    /**
     * @throws MappingException
     * @throws LockException
     */
    public function get(string $id): mixed
    {
        return $this->documentManager->getRepository(Record::class)
            ->find($id);
    }

    public function update(mixed $record): void
    {
    }

    public function create(mixed $record): void
    {
        $this->documentManager->persist($record);
    }

    /**
     * @throws \Throwable
     * @throws MongoDBException
     */
    public function flush(): void
    {
        $this->documentManager->flush();
    }

    public function clear(): void
    {
        $this->documentManager->clear();
    }
}
