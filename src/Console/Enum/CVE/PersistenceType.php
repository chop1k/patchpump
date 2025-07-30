<?php

declare(strict_types=1);

namespace App\Console\Enum\CVE;

enum PersistenceType: string
{
    case Guess = 'guess';

    case Mongo = 'mongo';
}
