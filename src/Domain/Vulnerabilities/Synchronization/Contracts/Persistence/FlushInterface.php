<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Contracts\Persistence;

interface FlushInterface
{
    public function flush(): void;

    public function clear(): void;
}
