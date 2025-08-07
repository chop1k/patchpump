<?php

declare(strict_types=1);

namespace App\Persistence\Enum\CVE;

enum RecordState: int
{
    case Published = 0;

    case Rejected = 1;
}
