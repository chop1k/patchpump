<?php

declare(strict_types=1);

namespace App\Console\Input\CVE\Sync;

use Symfony\Component\Console\Input\InputInterface;

final readonly class Source
{
    public function __construct(
        private InputInterface $input,
    ) {
    }

    public function directorySelected(): bool
    {
        return null !== $this->input->getOption('from-directory');
    }

    public function repositorySelected(): bool
    {
        return null !== $this->input->getOption('from-repository');
    }

    public function stdinSelected(): bool
    {
        return null !== $this->input->getOption('from-stdin');
    }

    public function fileSelected(): bool
    {
        return null !== $this->input->getOption('from-file');
    }
}
