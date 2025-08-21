<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Remove;

final class SuccessTable extends SpacedCommonTable
{
    protected string $headerTitle = 'Records';

    protected int $maximumColumnNumber = 4;
}
