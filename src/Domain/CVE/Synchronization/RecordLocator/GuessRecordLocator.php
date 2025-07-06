<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\RecordLocator;

use App\Domain\CVE\Synchronization\Contracts\RecordLocatorInterface;

final class GuessRecordLocator implements RecordLocatorInterface
{
    public function locateRecord(mixed $source): \Generator
    {
    }
}