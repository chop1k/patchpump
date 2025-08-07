<?php

declare(strict_types=1);

namespace App\Console\Enum\CVE;

enum SourceType: string
{
    case Directory = 'directory';

    case Repository = 'repository';

    case Stdin = 'stdin';

    case File = 'file';
}
