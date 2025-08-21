<?php

declare(strict_types=1);

namespace App\Console\Output\Common;

use Symfony\Component\Console\Output\OutputInterface;

final readonly class Padding
{
    public function __construct(
        private OutputInterface $output,
        private int $size
    ) {
    }

    public function render(): void
    {
        $this->output->writeln(array_fill(0, $this->size, ''));
    }
}