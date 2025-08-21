<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Remove;

final class NothingChangedTable extends SpacedCommonTable
{
    protected string $headerTitle = 'Not found';

    protected int $maximumColumnNumber = 4;
}
