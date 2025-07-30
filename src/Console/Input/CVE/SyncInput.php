<?php

declare(strict_types=1);

namespace App\Console\Input\CVE;

use App\Console\Enum\CVE\SourceType;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;

final readonly class SyncInput
{
    public function __construct(
        private InputInterface $input,
    ) {
    }

    public static function configure(Command $command): void
    {
        $command->addOption('from-directory', 'd', InputOption::VALUE_NONE);
        $command->addOption('from-archive', 'a', InputOption::VALUE_NONE);
        $command->addOption('from-repository', 'r', InputOption::VALUE_NONE);
        $command->addOption('from-stdin', 's', InputOption::VALUE_NONE);
        $command->addOption('from-file', 'f', InputOption::VALUE_NONE);

        $command->addArgument('records', InputArgument::OPTIONAL | InputArgument::IS_ARRAY);
    }

    public function sourceType(): SourceType
    {
        if ($this->input->getOption('from-directory')) {
            return SourceType::Directory;
        } elseif ($this->input->getOption('from-archive')) {
            return SourceType::Archive;
        } elseif ($this->input->getOption('from-repository')) {
            return SourceType::Repository;
        } elseif ($this->input->getOption('from-file')) {
            return SourceType::File;
        } elseif ($this->input->getOption('from-stdin')) {
            return SourceType::Stdin;
        }

        return SourceType::Guess;
    }

    /**
     * @return string[]
     */
    public function records():array
    {
        $records = $this->input->getArgument('records');

        if ($records === null) {
            return [];
        }

        if (!is_array($records)) {
            return [];
        }

        return $records;
    }
}