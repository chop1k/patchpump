<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\RecordLocator;

use App\Domain\CVE\Synchronization\Contracts\RecordLocatorInterface;

final class StdinRecordLocator implements RecordLocatorInterface
{
    private bool $located = false;

    public function locateRecord(mixed $source): \Generator
    {
        try {
            yield $this->located ? null : file_get_contents('php://stdin');
        } finally {
            $this->located = true;
        }
    }
}