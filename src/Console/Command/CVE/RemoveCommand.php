<?php

declare(strict_types=1);

namespace App\Console\Command\CVE;

use App\Console\Action\CVE\Remove;
use App\Console\Configuration\CVE as Configuration;
use App\Console\Input\CVE as Input;
use App\Console\Output\CVE as Output;
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
        (new Configuration\Remove($this))->configure();
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        (new Remove(
            $this->documentManager,
            new Input\Remove($input),
            new Output\Remove($output),
        ))->execute();

        return Command::SUCCESS;
    }
}
