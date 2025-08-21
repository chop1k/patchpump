<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Remove;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

abstract class CommonTable
{
    protected string $headerTitle;

    protected int $maximumColumnNumber;

    public function __construct(
        protected readonly OutputInterface $output,
        /**
         * @var string[] $items
         */
        protected readonly array $items,
    ) {
    }

    public function render(): void
    {
        $table = new Table($this->output);

        $table->setHeaderTitle($this->headerTitle);

        foreach ($this->rowsGenerator() as $row) {
            $table->addRow($row);
        }

        $table->render();
    }

    /**
     * @return \Generator<non-negative-int, string[]>
     */
    private function rowsGenerator(): \Generator
    {
        yield from array_chunk($this->items, $this->maximumColumnNumber);
    }
}
