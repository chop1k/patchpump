<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source;

use App\Domain\CVE\Synchronization\Source\Common\Factory;
use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use App\Persistence\Document\CVE\Record;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @implements SourceInterface<Record>
 */
final readonly class FileSource implements SourceInterface
{
    public function __construct(
        private Filesystem $filesystem,
        private Factory $factory,
        private string $path,
    ) {
    }

    /**
     * @return \Generator<string, Record>
     */
    public function generator(): \Generator
    {
        $text = $this->filesystem->readFile($this->path);

        $record = $this->factory->record($text)
            ->serialize()
            ->validate()
            ->toPersistence();

        yield $record->getId() => $record;
    }
}
