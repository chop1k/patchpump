<?php

declare(strict_types=1);

namespace App\Console\Input\CVE;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;

final readonly class SyncInput
{
    private Sync\SourceInput $source;

    public function __construct(
        private InputInterface $input,
    ) {
        $this->source = new Sync\SourceInput($this->input);
    }

    public static function configure(Command $command): void
    {
        Sync\SourceInput::configure($command);

        $command->addArgument('records', InputArgument::OPTIONAL | InputArgument::IS_ARRAY);
    }

    public function source(): Sync\SourceInput
    {
        return $this->source;
    }

    /**
     * @return string[]
     */
    public function records(): array
    {
        $records = $this->input->getArgument('records');

        if (null === $records) {
            return [];
        }

        if (!is_array($records)) {
            return [];
        }

        return $records;
    }
}
