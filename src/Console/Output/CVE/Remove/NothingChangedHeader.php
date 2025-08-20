<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Remove;

final class NothingChangedHeader extends CommonHeader
{
    protected string $format = '%d was already removed.';
}
