<?php

declare(strict_types=1);

namespace App\Console\Configuration\CVE;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;

final readonly class Remove
{
    public function __construct(
        private Command $command,
    ) {
    }

    public function configure(): void
    {
        $this->command->addArgument('values', InputArgument::REQUIRED | InputArgument::IS_ARRAY);
    }
}
