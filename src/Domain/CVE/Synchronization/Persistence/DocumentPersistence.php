<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Persistence;

use App\Domain\Vulnerabilities\Synchronization\Contracts\PersistenceInterface;
use App\Persistence\Document\CVE\Record;
use Doctrine\Persistence\ObjectManager;

/**
 * @implements PersistenceInterface<Record>
 */
final readonly class DocumentPersistence implements PersistenceInterface
{
    public function __construct(
        private ObjectManager $documentManager,
    ) {
    }

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function get(string $id): mixed
    {
        return $this->documentManager->getRepository(Record::class)
            ->find($id) ?? throw new \InvalidArgumentException("Record with id $id not found");
    }

    public function update(mixed $record): void
    {
    }

    public function create(mixed $record): void
    {
        $this->documentManager->persist($record);
    }

    public function flush(): void
    {
        $this->documentManager->flush();
    }

    public function clear(): void
    {
        $this->documentManager->clear();
    }
}
