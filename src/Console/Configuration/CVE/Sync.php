<?php

declare(strict_types=1);

namespace App\Console\Configuration\CVE;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

final readonly class Sync
{
    public function __construct(
        private Command $command,
    ) {
    }

    public function configure(): void
    {
        $this->command->addOption('from-directory', 'd', InputOption::VALUE_NONE);
        $this->command->addOption('from-repository', 'r', InputOption::VALUE_NONE);
        $this->command->addOption('from-stdin', 's', InputOption::VALUE_NONE);
        $this->command->addOption('from-file', 'f', InputOption::VALUE_NONE);

        $this->command->addArgument('records', InputArgument::OPTIONAL | InputArgument::IS_ARRAY);
    }
}
