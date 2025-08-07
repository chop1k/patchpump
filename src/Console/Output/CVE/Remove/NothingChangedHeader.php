<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Remove;

use App\Console\Output\Style\Paragraph\ParagraphStyle;

final readonly class NothingChangedHeader
{
    public function __construct(
        private ParagraphStyle $paragraph,
        /**
         * @var non-negative-int $count
         */
        private int $count,
    ) {
    }

    public function render(): void
    {
        $this->paragraph->comment("$this->count was already removed.");
    }
}