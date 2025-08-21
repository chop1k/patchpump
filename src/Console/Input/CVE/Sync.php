<?php

declare(strict_types=1);

namespace App\Console\Input\CVE;

use Symfony\Component\Console\Input\InputInterface;

final readonly class Sync
{
    private Sync\Source $source;

    public function __construct(
        private InputInterface $input,
    ) {
        $this->source = new Sync\Source($this->input);
    }

    public function source(): Sync\Source
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
