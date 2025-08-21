<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Remove;

use Symfony\Component\Console\Output\OutputInterface;

abstract class CommonHeader
{
    protected string $format;

    public function __construct(
        protected readonly OutputInterface $output,
        /**
         * @var non-negative-int $count
         */
        protected readonly int $count,
    ) {
    }

    protected function text(): string
    {
        return sprintf($this->format, $this->count);
    }

    public function render(): void
    {
        $this->output->writeln(
            $this->text(),
        );
    }
}
