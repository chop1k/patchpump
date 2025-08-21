<?php

declare(strict_types=1);

namespace App\Console\Input\CVE;

use Symfony\Component\Console\Input\InputInterface;

/**
 * php bin/console pp:cve:remove
 *     CVE-2023-4123
 *     CVE-2002-4451
 *     ...
 */
final readonly class Remove
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
