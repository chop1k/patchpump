<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL\Contracts;

interface SQLPersistenceInterface
{
    public function request(SQLName $name, SQLArguments $arguments): SQLRequest;
}
