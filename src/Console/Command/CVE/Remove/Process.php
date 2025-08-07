<?php

declare(strict_types=1);

namespace App\Console\Command\CVE\Remove;

use App\Persistence\Document\CVE\Record;
use Doctrine\ODM\MongoDB\DocumentManager;

final readonly class Process
{
    public function __construct(
        private DocumentManager $documentManager,
        /**
         * @var string[] $records
         */
        private array $records,
    ) {
    }

    public function findRecords(): SearchResult
    {
        $results = $this->documentManager->createQueryBuilder(Record::class)
            ->field('id')->in($this->records)
            ->getQuery()
            ->execute();

        $notFound = [];

        foreach ($results as $record) {
            $notFound[] = $record->getId();
        }

        return new SearchResult(
            $this->documentManager,
            $notFound,
        );
    }
}
