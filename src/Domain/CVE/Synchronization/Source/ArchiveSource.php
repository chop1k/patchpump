<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source;

use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use App\Persistence\Document\CVE\Record;

/**
 * @implements SourceInterface<Record>
 */
final class ArchiveSource implements SourceInterface
{
    public function generator(): \Generator
    {
        throw new \BadMethodCallException('Not implemented');
    }
}
