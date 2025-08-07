<?php

declare(strict_types=1);

namespace App\Console\Input\CVE;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;

/**
 * php bin/console pp:cve:remove
 *     CVE-2023-4123
 *     CVE-2002-4451
 *     ...
 */
final readonly class RemoveInput
{
    public function __construct(
        private InputInterface $input,
    ) {
    }

    public static function configure(Command $command): void
    {
        $command->addArgument('values', InputArgument::REQUIRED | InputArgument::IS_ARRAY);
    }

    /**
     * @return string[]
     */
    public function values(): array
    {
        $content = $this->input->getArgument('values');

        if (false === is_array($content)) {
            throw new \InvalidArgumentException('values');
        }

        return array_filter($content, 'is_string');
    }
}
