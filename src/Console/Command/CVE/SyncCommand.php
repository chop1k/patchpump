<?php

declare(strict_types=1);

namespace App\Console\Command\CVE;

use App\Console\Action\CVE\Sync;
use App\Console\Configuration\CVE as Configuration;
use App\Console\Factory\CVE as Factory;
use App\Console\Input\CVE as Input;
use App\Console\Output\CVE as Output;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
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
        private readonly EventDispatcherInterface $eventDispatcher,
        private readonly DocumentManager $documentManager,
    ) {
        parent::__construct();
    }

    #[\Override]
    protected function configure(): void
    {
        (new Configuration\Sync($this))->configure();
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        (new Sync(
            $this->eventDispatcher,
            new Output\Sync(
                new SymfonyStyle($input, $output),
            ),
            new Factory\Sync(
                $this->serializer,
                $this->validator,
                $this->documentManager,
                new Input\Sync($input),
            ),
        ))->execute();

        return Command::SUCCESS;
    }
}
