<?php

declare(strict_types=1);

namespace App\Console\Enum;

enum SyncFrom: int
{
    case Auto = 0;

    case Directory = 1;

    case Archive = 2;

    case Repository = 3;

    case Stdin = 4;

    case File = 5;
}