<?php

declare(strict_types=1);

namespace App\Console\Enum\CVE;

enum ComparatorType: string
{
    case Guess = 'guess';

    case Date = 'date';
}
