<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source\Directory;

use App\Persistence\Document\CVE\Record;

final readonly class DirectoryRecord
{
    public function __construct(
        private ?Record $record,
    ) {
    }

    public function valid(): bool
    {
        return $this->record?->getId() !== null;
    }

    public function id(): string
    {
        return $this->record?->getId() ?? throw new \LogicException('Should be checked with valid() before usage');
    }

    public function record(): Record
    {
        return $this->record ?? throw new \LogicException('Should be checked with valid() before usage');
    }
}