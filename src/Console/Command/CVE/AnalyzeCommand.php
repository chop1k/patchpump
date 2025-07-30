<?php

declare(strict_types=1);

namespace App\Console\Command\CVE;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'pp:cve:analyze',
    description: 'Make an analytic report about system cve database.',
)]
final class AnalyzeCommand extends Command
{
    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return 0;
    }
}
