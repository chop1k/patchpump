<?php

declare(strict_types=1);

namespace App\Console\Input\CVE\Sync;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;

final readonly class SourceInput
{
    public function __construct(
        private InputInterface $input,
    ) {
    }

    public static function configure(Command $command): void
    {
        $command->addOption('from-directory', 'd', InputOption::VALUE_NONE);
        $command->addOption('from-repository', 'r', InputOption::VALUE_NONE);
        $command->addOption('from-stdin', 's', InputOption::VALUE_NONE);
        $command->addOption('from-file', 'f', InputOption::VALUE_NONE);
    }

    public function directorySelected(): bool
    {
        return null !== $this->input->getOption('from-directory');
    }

    public function repositorySelected(): bool
    {
        return null !== $this->input->getOption('from-repository');
    }

    public function stdinSelected(): bool
    {
        return null !== $this->input->getOption('from-stdin');
    }

    public function fileSelected(): bool
    {
        return null !== $this->input->getOption('from-file');
    }
}
