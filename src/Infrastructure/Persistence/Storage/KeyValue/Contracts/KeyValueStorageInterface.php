<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\KeyValue\Contracts;

interface KeyValueStorageInterface
{
    public function read(string $key): string;

    public function write(string $key, string $data): void;
}
