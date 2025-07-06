<?php

declare(strict_types=1);

namespace App\Console\Command\CVE;

use App\Domain\CVE\Synchronization\RecordComparator\DateRecordComparator;
use App\Domain\CVE\Synchronization\RecordLocator\ArchiveRecordLocator;
use App\Domain\CVE\Synchronization\RecordLocator\DirectoryRecordLocator;
use App\Domain\CVE\Synchronization\RecordLocator\FileRecordLocator;
use App\Domain\CVE\Synchronization\RecordLocator\GuessRecordLocator;
use App\Domain\CVE\Synchronization\RecordLocator\RepositoryRecordLocator;
use App\Domain\CVE\Synchronization\RecordLocator\StdinRecordLocator;
use App\Domain\CVE\Synchronization\RecordSynchronizer;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[AsCommand(
    name: 'pp:cve:sync',
    description: 'Synchronize CVE records.'
)]
final class SyncCommand extends Command
{
    public function __construct(
        private readonly SerializerInterface $serializer,
        private readonly ValidatorInterface $validator,
        private readonly DocumentManager $documentManager,
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addOption('from-directory', 'd', InputOption::VALUE_NONE);
        $this->addOption('from-archive', 'a', InputOption::VALUE_NONE);
        $this->addOption('from-repository', 'r', InputOption::VALUE_NONE);
        $this->addOption('from-stdin', 's', InputOption::VALUE_NONE);
        $this->addOption('from-file', 'f', InputOption::VALUE_NONE);

        $this->addOption('format', 'F', InputOption::VALUE_REQUIRED, '', 'console');

        $this->addArgument('records', InputArgument::OPTIONAL|InputArgument::IS_ARRAY);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $fromDirectory = $input->getOption('from-directory') ?? false;
        $fromArchive = $input->getOption('from-archive') ?? false;
        $fromRepository = $input->getOption('from-repository') ?? false;
        $fromStdin = $input->getOption('from-stdin') ?? false;
        $fromFile = $input->getOption('from-file') ?? false;

        if ($fromDirectory) {
            $recordLocator = new DirectoryRecordLocator();
        } else if ($fromArchive) {
            $recordLocator = new ArchiveRecordLocator();
        } else if ($fromRepository) {
            $recordLocator = new RepositoryRecordLocator();
        } else if ($fromStdin) {
            $recordLocator = new StdinRecordLocator();
        } else if ($fromFile) {
            $recordLocator = new FileRecordLocator();
        } else {
            $recordLocator = new GuessRecordLocator();
        }

        $recordComparator = new DateRecordComparator();

        (new RecordSynchronizer(
            $recordLocator,
            $recordComparator,
            $this->serializer,
            $this->validator,
            $this->documentManager,
        ))->synchronize(
            $input->getArgument('records'),
        );

        return 0;
    }
}
