<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Find;

use App\Console\Output\Style\Paragraph\ParagraphStyle;

final readonly class NothingFoundHeader
{
    public function __construct(
        private ParagraphStyle $paragraph,
    ) {
    }

    public function render(): void
    {
        $this->paragraph->comment('Nothing found.');
    }
}
