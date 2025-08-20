<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Remove;

final class SuccessHeader extends CommonHeader
{
    protected string $format = 'Successfully removed %d records';
}
