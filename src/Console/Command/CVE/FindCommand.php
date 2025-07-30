<?php

declare(strict_types=1);

namespace App\Console\Command\CVE;

use App\Console\Input\CVE\FindInput;
use App\Persistence\Document\CVE\Record;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *
 */
#[AsCommand(
    name: 'pp:cve:find',
    description: 'Find cve records by specific parameters.',
)]
final class FindCommand extends Command
{
    public function __construct(
        private DocumentManager $documentManager,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        FindInput::configure($this);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $records = $this->documentManager->getRepository(Record::class)
            ->findAll();

        foreach ($records as $record) {
        }

        return 0;
    }
}
