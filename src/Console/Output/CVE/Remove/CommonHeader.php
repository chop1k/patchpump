<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Remove;

use App\Console\Output\Style\Paragraph\ParagraphStyle;

abstract class CommonHeader
{
    protected string $format;

    public function __construct(
        private readonly ParagraphStyle $paragraph,
        /**
         * @var non-negative-int $count
         */
        private readonly int $count,
    ) {
    }

    protected function text(): string
    {
        return sprintf($this->format, $this->count);
    }

    public function render(): void
    {
        $this->paragraph->comment(
            $this->text(),
        );
    }
}
