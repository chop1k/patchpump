<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Remove;

final class SuccessHeader extends SpacedCommonHeader
{
    protected string $format = '<info>Successfully removed %d records.</info>';
}
