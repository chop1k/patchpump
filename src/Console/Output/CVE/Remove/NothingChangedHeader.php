<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Remove;

final class NothingChangedHeader extends SpacedCommonHeader
{
    protected string $format = '<comment>%d records was already removed.</comment>';
}
