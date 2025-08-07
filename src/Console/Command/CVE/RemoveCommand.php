<?php

declare(strict_types=1);

namespace App\Console\Command\CVE;

use App\Console\Command\CVE\Remove\Process;
use App\Console\Input\CVE\RemoveInput;
use App\Console\Output\CVE\RemoveOutput;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'pp:cve:remove',
    description: 'Remove cve record from the system.',
)]
final class RemoveCommand extends Command
{
    public function __construct(
        private readonly DocumentManager $documentManager,
    ) {
        parent::__construct();
    }

    #[\Override]
    protected function configure(): void
    {
        RemoveInput::configure($this);
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $input = new RemoveInput($input);
        $output = new RemoveOutput($output);

        $toRemove = $input->values();

        $process = new Process($this->documentManager, $toRemove);

        $removed = $process
            ->findRecords()
            ->remove();

        $notFound = array_values(
            array_diff($toRemove, $removed),
        );

        if (count($notFound) > 0) {
            $output->nothingToRemove($notFound);
        }

        if (count($removed) > 0) {
            $output->success($removed);
        }

        return Command::SUCCESS;
    }
}
