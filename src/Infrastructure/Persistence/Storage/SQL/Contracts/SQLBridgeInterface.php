<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL\Contracts;

interface SQLBridgeInterface
{
    public function response(string $template, array $arguments): array;
}
