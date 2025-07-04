<?php

declare(strict_types=1);

namespace App\Persistence\Enum\CVE;

enum ApplicabilityOperator: int
{
    case And = 1;

    case Or = 2;
}