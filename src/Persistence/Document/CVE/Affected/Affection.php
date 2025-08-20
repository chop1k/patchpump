<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Affected;

enum Affection: int
{
    case Unknown = 0;

    case Affected = 1;

    case Unaffected = 2;
}
