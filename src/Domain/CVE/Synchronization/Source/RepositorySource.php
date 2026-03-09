<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source;

use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\AbstractRecord;
use BadMethodCallException;
use Generator;
use Override;

/**
 * @implements SourceInterface<AbstractRecord>
 */
final class RepositorySource implements SourceInterface
{
    /**
     * @return Generator<string, AbstractRecord>
     */
    #[Override]
    public function generator(): Generator
    {
        throw new BadMethodCallException('Not implemented');
    }
}
