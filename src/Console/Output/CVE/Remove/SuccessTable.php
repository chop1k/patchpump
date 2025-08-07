<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Remove;

use App\Console\Output\Style\Paragraph\ParagraphStyle;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

final readonly class SuccessTable
{
    public function __construct(
        private OutputInterface $output,
        private ParagraphStyle $paragraph,
        /**
         * @var string $removed
         */
        private array $removed,
        /**
         * @var non-negative-int $count
         */
        private int $count,
    ) {
    }

    public function render(): void
    {
        $this->paragraph->startSection();

        $this->renderTable();

        $this->paragraph->endSection();
    }

    private function renderTable(): void
    {
        $table = new Table($this->output);

        $table->setHeaderTitle('Records');

        for ($i = 0; $i < $this->count; $i += 4) {
            $items = [];

            for ($j = 0; $j < 4; ++$j) {
                $record = $this->removed[$i + $j] ?? null;

                if (null === $record) {
                    break;
                }

                $items[] = $record;
            }

            $table->addRow($items);
        }

        $table->render();
    }
}
