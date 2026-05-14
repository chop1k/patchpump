<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL\Contracts;

interface SQLRequestInterface
{
    public function response(): SQLResponse;
}
