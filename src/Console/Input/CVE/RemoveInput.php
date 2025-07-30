<?php

declare(strict_types=1);

namespace App\Console\Input\CVE;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;

final readonly class RemoveInput
{
    public function __construct(
        private InputInterface $input,
    ) {
    }

    public static function configure(Command $command): void
    {
        $command->addArgument('value', InputArgument::REQUIRED);
    }

    public function value(): string
    {
        return $this->input->getArgument('value');
    }
}