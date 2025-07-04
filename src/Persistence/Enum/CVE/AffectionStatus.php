<?php

declare(strict_types=1);

namespace App\Persistence\Enum\CVE;

enum AffectionStatus: int
{
    case Unknown = 0;

    case Affected = 1;

    case Unaffected = 2;
}