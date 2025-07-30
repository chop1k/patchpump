<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source;

use App\Domain\CVE\Synchronization\Source\Common\Factory;
use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use App\Persistence\Document\CVE\Record;

/**
 * @implements SourceInterface<Record>
 */
final readonly class StdinSource implements SourceInterface
{
    public function __construct(
        private Factory $factory,
    ) {
    }

    public function generator(): \Generator
    {
        $text = file_get_contents('php://stdin');

        if (false === $text) {
            throw new \RuntimeException('Could not read from stdin');
        }

        $record = $this->factory->record($text)
            ->serialize()
            ->validate()
            ->toPersistence();

        yield $record->getId() => $record;
    }
}
