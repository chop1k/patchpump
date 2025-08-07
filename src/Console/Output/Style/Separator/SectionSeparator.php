<?php

declare(strict_types=1);

namespace App\Console\Output\Style\Separator;

final readonly class SectionSeparator implements \Stringable
{
    public function __construct(
        private int $length,
        private string $char,
    ) {
    }

    public function __toString(): string
    {
        return implode(array_fill(0, $this->length, $this->char));
    }
}
