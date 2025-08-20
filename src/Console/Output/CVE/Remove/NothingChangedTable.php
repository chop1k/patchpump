<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Remove;

final class NothingChangedTable extends CommonTable
{
    protected string $headerTitle = 'Not found';

    protected int $maximumColumnNumber = 4;
}
