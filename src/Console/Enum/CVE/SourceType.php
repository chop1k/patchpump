<?php

declare(strict_types=1);

namespace App\Console\Enum\CVE;

enum SourceType: string
{
    case Guess = 'guess';

    case Directory = 'directory';

    case Archive = 'archive';

    case Repository = 'repository';

    case Stdin = 'stdin';

    case File = 'file';
}
