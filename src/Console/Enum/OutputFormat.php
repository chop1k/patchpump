<?php

declare(strict_types=1);

namespace App\Console\Enum;

enum OutputFormat: string
{
    case Console = 'console';

    case Json = 'json';
}