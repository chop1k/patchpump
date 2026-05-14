<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\KeyValue\Contracts;

interface TransactionalKeyValueStorageInterface extends KeyValueStorageInterface
{
    public function beginTransaction(): void;

    public function commit(): void;
}
