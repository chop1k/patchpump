<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Common\Description;

enum Type: int
{
    case Plain = 0;

    case Configuration = 1;

    case Workaround = 2;

    case Solution = 3;

    case Exploit = 4;
}
