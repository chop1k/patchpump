<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Contracts;

use App\Domain\Vulnerabilities\Synchronization\Contracts\Persistence\FlushInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\Persistence\ReadOperationInterface;
use App\Domain\Vulnerabilities\Synchronization\Contracts\Persistence\WriteOperationInterface;

/**
 * @template T
 *
 * @extends ReadOperationInterface<T>
 * @extends WriteOperationInterface<T>
 */
interface PersistenceInterface extends ReadOperationInterface, WriteOperationInterface, FlushInterface
{
}
