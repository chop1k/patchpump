<?php

declare(strict_types=1);

namespace App\Persistence\Enum;

enum ContactServiceType: int
{
    case Unknown = 0;
    case Telegram = 1;
    case Email = 2;
    case Discord = 3;
}