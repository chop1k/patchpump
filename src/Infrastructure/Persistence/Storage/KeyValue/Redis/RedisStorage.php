<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\KeyValue\Redis;

use App\Infrastructure\Persistence\Storage\KeyValue\Contracts\TransactionalKeyValueStorageInterface;
use Exception;
use Override;
use Redis;

final readonly class RedisStorage implements TransactionalKeyValueStorageInterface
{
    public function __construct(
        private Redis $driver,
    ) {
    }

    #[Override]
    public function read(string $key): string
    {
        return $this->driver->get($key);
    }

    #[Override]
    public function write(string $key, string $data): void
    {
        $this->driver->set($key, $data);
    }

    /**
     * @throws Exception
     */
    #[Override]
    public function beginTransaction(): void
    {
        // todo: normal exception
        $this->driver->multi() ?: throw new Exception('213');
    }

    /**
     * @throws Exception
     */
    #[Override]
    public function commit(): void
    {
        $results = $this->driver->exec();

        if (false === $results) {
            // todo: normal exception
            throw new Exception('213');
        }
    }
}
