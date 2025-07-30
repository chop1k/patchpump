<?php

declare(strict_types=1);

namespace App\Console\Input\CVE;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;

final readonly class FindInput
{
    public function __construct(
        private InputInterface $input,
    ) {
    }

    public static function configure(Command $command): void
    {
        $command->addOption('id', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('title', null, InputOption::VALUE_OPTIONAL); // exact title
        $command->addOption('title-contains', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('published-at', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('published-before', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('published-after', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('updated-at', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('updated-before', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('updated-after', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('reserved-at', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('reserved-before', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('reserved-after', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('rejected-at', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('rejected-before', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('rejected-after', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('published', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('rejected', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('assigner', null, InputOption::VALUE_OPTIONAL); // name or id
        $command->addOption('description-contains', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('configuration-contains', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('workaround-contains', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('exploit-contains', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('solution-contains', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('affected-vendor', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('affected-package', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('affected-version', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('problem-cwe', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('problem-type', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('problem-contains', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('provided-by', null, InputOption::VALUE_OPTIONAL); // name or id
        $command->addOption('cpe', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('metric-type', null, InputOption::VALUE_OPTIONAL);
        $command->addOption('metric-cvss', null, InputOption::VALUE_OPTIONAL); // vector regex
        $command->addOption('metric-cvss-score', null, InputOption::VALUE_OPTIONAL); // operator + score
        $command->addOption('metric-cvss-severity', null, InputOption::VALUE_OPTIONAL);
    }
}