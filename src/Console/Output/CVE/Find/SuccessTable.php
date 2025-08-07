<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Find;

use App\Persistence\Document\CVE\Record;
use Symfony\Component\Console\Output\OutputInterface;

final readonly class SuccessTable
{
    public function __construct(
        private OutputInterface $output,
        private Record $record,
    ) {
    }

    public function render(): void
    {
        $this->output->writeln($this->record->getId());
    }
}
