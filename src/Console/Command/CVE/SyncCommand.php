<?php

declare(strict_types=1);

namespace App\Console\Command\CVE;

use App\Console\Factory\CVE\Factory;
use App\Console\Input\CVE\SyncInput;
use App\Console\Output\CVE\SyncOutput;
use App\Domain\Vulnerabilities\Synchronization\Process;
use App\Domain\Vulnerabilities\Synchronization\Result;
use App\Persistence\Document\CVE\Record;
use Doctrine\Persistence\ObjectManager;
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
        private readonly ObjectManager $documentManager,
    ) {
        parent::__construct();
    }

    #[\Override]
    protected function configure(): void
    {
        SyncInput::configure($this);
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->executeSync(
            new SyncInput($input),
            new SyncOutput($io),
        );

        return Command::SUCCESS;
    }

    private function executeSync(SyncInput $input, SyncOutput $output): void
    {
        $factory = new Factory(
            $this->serializer,
            $this->validator,
            $this->documentManager,
            $input
        );

        /**
         * @var Process<Record> $process
         */
        $process = new Process(
            $this->eventDispatcher,
            $factory->source(),
            $factory->persistence(),
            $factory->comparator(),
        );

        $counters = [
            'created' => 0,
            'updated' => 0,
            'nothing' => 0,
        ];

        /**
         * По каким-то неведомым мне причинам, IDE считает, что $result является генератором.
         * Хотя в блоке документации к методу generator() явно указано, что возвращаемый генератор перечисляет экземпляры
         * класса Result с шаблоном, который должен быть динамически вычислен из аргументов конструктора...
         *
         * @var Result<Record> $result
         */
        foreach ($process->generator(16) as $result) {
            $record = $result->record();

            if ($result->created() === true) {
                $counters['created']++;

                $output->recordCreated($record);

                continue;
            }

            if ($result->updated() === true) {
                $counters['updated']++;

                $output->recordUpdated($record);

                continue;
            }

            $counters['nothing']++;

            $output->nothingChanged($record);
        }

        $output->done($counters['updated'], $counters['created'], $counters['nothing']);
    }
}
