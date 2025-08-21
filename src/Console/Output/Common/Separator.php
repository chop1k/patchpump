<?php

declare(strict_types=1);

namespace App\Console\Output\Common;

use Symfony\Component\Console\Output\OutputInterface;

final readonly class Separator
{
    public function __construct(
        private OutputInterface $output,
        private int $length,
        private string $char,
    ) {
    }
    public function render(): void
    {
        $this->output->writeln(str_repeat($this->char, $this->length));
    }
}
