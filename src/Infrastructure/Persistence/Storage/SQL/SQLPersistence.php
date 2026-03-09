<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL;

use App\Infrastructure\Persistence\Contracts\PersistenceInterface;
use App\Infrastructure\Persistence\Contracts\ResponseInterface;
use App\Persistence\SQL\Contracts\Request\ArgumentsInterface;
use App\Persistence\SQL\Contracts\Request\NameInterface;
use Override;

/**
 * @implements PersistenceInterface<SQLName, SQLResponse>
 */
final readonly class SQLPersistence implements PersistenceInterface
{
    public function __construct(
    ) {
    }

    #[Override]
    public function response(NameInterface $name, ArgumentsInterface $arguments): ResponseInterface
    {
    }
}
