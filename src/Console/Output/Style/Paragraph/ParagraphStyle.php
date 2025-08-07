<?php

declare(strict_types=1);

namespace App\Console\Output\Style\Paragraph;

use App\Console\Output\Style\Separator\SectionSeparator;
use Symfony\Component\Console\Output\OutputInterface;

final readonly class ParagraphStyle
{
    public function __construct(
        private SectionSeparator $separator,
        private OutputInterface $output,
    ) {
    }

    public function startSection(): void
    {
        $this->output->writeln([
            $this->separator,
            '',
        ]);
    }

    public function endSection(): void
    {
        $this->output->writeln([
            '',
            $this->separator,
        ]);
    }

    public function info(string $message): void
    {
        $message = sprintf('<info>%s</info>', $message);

        $this->startSection();
        $this->output->writeln($message);
        $this->endSection();
    }

    public function comment(string $message): void
    {
        $message = sprintf('<comment>%s</comment>', $message);

        $this->startSection();
        $this->output->writeln($message);
        $this->endSection();
    }

    public function error(string $message): void
    {
        $message = sprintf('<error>%s</error>', $message);

        $this->startSection();
        $this->output->writeln($message);
        $this->endSection();
    }

    public function debug(string $message): void
    {
        $message = sprintf('<debug>%s</debug>', $message);

        $this->startSection();
        $this->output->writeln($message);
        $this->endSection();
    }
}
