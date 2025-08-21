<?php

declare(strict_types=1);

namespace App\Console\Input\CVE;

use Symfony\Component\Console\Input\InputInterface;

final readonly class Show
{
    public function __construct(
        private InputInterface $input,
    ) {
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
