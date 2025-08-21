<?php

declare(strict_types=1);

namespace App\Console\Configuration\CVE;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;

final readonly class Find
{
    public function __construct(
        private Command $command,
    ) {
    }

    private function configureCriteria(string $name): void
    {
        $this->command->addOption($name, null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY);
    }

    public function configure(): void
    {
        $this->configureCriteria('id');
        $this->configureCriteria('title');
        $this->configureCriteria('published');
        $this->configureCriteria('updated');
        $this->configureCriteria('reserved');
        $this->configureCriteria('rejected');
        $this->configureCriteria('assigner');
        //        self::configureCriteria($command, 'description'); // search for keywords
        //        self::configureCriteria($command, 'configuration');
        //        self::configureCriteria($command, 'workaround');
        //        self::configureCriteria($command, 'exploit');
        //        self::configureCriteria($command, 'solution');
        //        self::configureCriteria($command, 'affected');
        //        self::configureCriteria($command, 'problem'); // search for keywords
        //        self::configureCriteria($command, 'provided-by'); // name or id
        //        self::configureCriteria($command, 'cpe');
        //        self::configureCriteria($command, 'metrics');
    }
}
