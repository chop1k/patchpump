<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Persistence;

use App\Domain\Vulnerabilities\Synchronization\Contracts\PersistenceInterface;
use Doctrine\ODM\MongoDB\DocumentManager;
use InvalidArgumentException;
use Override;

/**
 * @implements PersistenceInterface<\App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\AbstractRecord>
 */
final readonly class DocumentPersistence implements PersistenceInterface
{
    private const array RECORD_CLASS = [
        \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Published::class,
        \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Rejected::class,
    ];

    public function __construct(
        private DocumentManager $documentManager,
    ) {
    }

    #[Override]
    public function get(string $id): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\AbstractRecord
    {
        $builder = $this->documentManager->createQueryBuilder(self::RECORD_CLASS);

        $query = $builder
            ->field('id')
                ->equals($id)
            ->getQuery();

        /**
         * @var \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\AbstractRecord $result
         *
         * @psalm-ignore-var
         */
        $result = $query->getSingleResult();

        if (null === $result) {
            throw new InvalidArgumentException();
        }

        return $result;
    }

    #[Override]
    public function update(mixed $record): void
    {
    }

    #[Override]
    public function create(mixed $record): void
    {
        $this->documentManager->persist($record);
    }

    #[Override]
    public function flush(): void
    {
        $this->documentManager->flush();
    }

    #[Override]
    public function clear(): void
    {
        $this->documentManager->clear();
    }
}
