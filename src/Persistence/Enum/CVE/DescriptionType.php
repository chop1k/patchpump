<?php

declare(strict_types=1);

namespace App\Persistence\Enum\CVE;

enum DescriptionType: int
{
    case Plain = 0;

    case Configuration = 1;

    case Workaround = 2;

    case Solution = 3;

    case Exploit = 4;
}
