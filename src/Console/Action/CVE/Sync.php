<?php

declare(strict_types=1);

namespace App\Console\Action\CVE;

use App\Console\Factory\CVE as Factory;
use App\Console\Output\CVE as Output;
use App\Domain\Vulnerabilities\Synchronization;
use App\Persistence\Document\CVE\Record;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

final readonly class Sync
{
    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
        private Output\Sync $output,
        private Factory\Sync $factory,
    ) {
    }

    public function execute(): void
    {
        /**
         * @var Synchronization\Process<Record> $process
         */
        $process = new Synchronization\Process(
            $this->eventDispatcher,
            $this->factory->source(),
            $this->factory->persistence(),
            $this->factory->comparator(),
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
         * @var Synchronization\Result<Record> $result
         */
        foreach ($process->generator(16) as $result) {
            $record = $result->record();

            if (true === $result->created()) {
                ++$counters['created'];

                $this->output->recordCreated($record);

                continue;
            }

            if (true === $result->updated()) {
                ++$counters['updated'];

                $this->output->recordUpdated($record);

                continue;
            }

            ++$counters['nothing'];

            $this->output->nothingChanged($record);
        }

        $this->output->done($counters['updated'], $counters['created'], $counters['nothing']);
    }
}
