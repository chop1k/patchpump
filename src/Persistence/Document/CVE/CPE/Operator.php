<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\CPE;

enum Operator: int
{
    case And = 1;

    case Or = 2;
}
