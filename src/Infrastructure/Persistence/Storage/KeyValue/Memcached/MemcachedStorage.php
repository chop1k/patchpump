<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\KeyValue\Memcached;

use App\Infrastructure\Persistence\Storage\KeyValue\Contracts\TransactionalKeyValueStorageInterface;
use Exception;
use Memcached;
use Override;

final readonly class MemcachedStorage implements TransactionalKeyValueStorageInterface
{
    public function __construct(
        private Memcached $memcached,
    ) {
    }

    /**
     * @throws Exception
     */
    #[Override]
    public function read(string $key): string
    {
        $result = $this->memcached->get($key);

        if (false === $result) {
            // todo: normal exception
            throw new Exception('a');
        }

        return $result;
    }

    /**
     * @throws Exception
     */
    #[Override]
    public function write(string $key, string $data): void
    {
        $result = $this->memcached->set($key, $data);

        if (false === $result) {
            // todo: normal exception
            throw new Exception('b');
        }
    }

    #[Override]
    public function beginTransaction(): void
    {
    }

    #[Override]
    public function commit(): void
    {
    }
}
