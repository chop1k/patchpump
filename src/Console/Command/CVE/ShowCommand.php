<?php

declare(strict_types=1);

namespace App\Console\Command\CVE;

use App\Console\Input\CVE\ShowInput;
use App\Console\Output\CVE\ShowOutput;
use App\Persistence\Document\CVE\Record;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'pp:cve:show',
    description: 'Show cve for a specific cve.',
)]
final class ShowCommand extends Command
{
    public function __construct(
        private readonly DocumentManager $documentManager,
    ) {
        parent::__construct();
    }

    #[\Override]
    protected function configure(): void
    {
        ShowInput::configure($this);
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $input = new ShowInput($input);
        $output = new ShowOutput($io);

        $values = $input->values();

        foreach ($values as $value) {
            $record = $this->documentManager->getRepository(Record::class)
                ->find($value);

            if (null === $record) {
                $output->notFound($value);

                continue;
            }

            $output->recordFound($record);
        }

        return Command::SUCCESS;
    }
}
