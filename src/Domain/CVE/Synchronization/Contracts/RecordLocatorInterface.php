<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Contracts;

interface RecordLocatorInterface
{
    public function locateRecord(mixed $source): \Generator;
}