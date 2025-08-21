<?php

declare(strict_types=1);

namespace App\Console\Output\CVE;

use App\Persistence\Document\CVE\Record;
use Symfony\Component\Console\Style\SymfonyStyle;

final readonly class Sync
{
    public function __construct(
        private SymfonyStyle $style,
    ) {
    }

    public function nothingChanged(Record $record): void
    {
        $message = sprintf('Nothing changed for record "%s"', $record->id());

        $this->style->block($message);
    }

    public function recordCreated(Record $record): void
    {
        $message = sprintf('Created record "%s"', $record->id());

        $this->style->writeln($message);
    }

    public function recordUpdated(Record $record): void
    {
        $message = sprintf('Updated record "%s"', $record->id());

        $this->style->writeln($message);
    }

    public function done(int $updated, int $created, int $nothing): void
    {
        $this->style->success('Finished synchronization process');

        $this->style->comment([
            sprintf('%d records updated', $updated),
            sprintf('%d records created', $created),
            sprintf('for %d records nothing changed', $nothing),
        ]);
    }
}
