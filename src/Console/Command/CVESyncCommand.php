<?php

declare(strict_types=1);

namespace App\Console\Command;

use League\Flysystem\FilesystemAdapter;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\SerializerInterface;

#[AsCommand(
    name: 'pp:cve:sync',
    description: 'Synchronize CVE records.'
)]
final class CVESyncCommand extends Command
{
    public function __construct(
        private readonly SerializerInterface $serializer,
        private readonly FilesystemAdapter $temporaryStorage,
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addOption('from-directory', 'f', InputOption::VALUE_NONE);
        $this->addOption('from-archive', 'f', InputOption::VALUE_NONE);
        $this->addOption('from-repository', 'r', InputOption::VALUE_NONE);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $fromDirectory = $input->getOption('from-directory');

        if (!$fromDirectory) {

        }
    }

    protected function executeFromDirectory(InputInterface $input, OutputInterface $output): int
    {
    }

    protected function executeFromArchive(InputInterface $input, OutputInterface $output): int
    {
    }

    protected function executeFromRepository(InputInterface $input, OutputInterface $output): int
    {
    }
}
