<?php

declare(strict_types=1);

namespace App\Console\Command\CVE\Remove;

use App\Persistence\Document\CVE\Record;
use Doctrine\ODM\MongoDB\DocumentManager;

final readonly class SearchResult
{
    public function __construct(
        private DocumentManager $documentManager,
        /**
         * @var string $recordsToRemove
         */
        private array $recordsToRemove,
    ) {
    }

    public function remove(): array
    {
        $this->documentManager->createQueryBuilder(Record::class)
            ->remove()
            ->field('id')->in($this->recordsToRemove)
            ->getQuery()
            ->execute();

        return $this->recordsToRemove;
    }
}
