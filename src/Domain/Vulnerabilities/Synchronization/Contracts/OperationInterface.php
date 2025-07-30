<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Contracts;

interface OperationInterface
{
    public function execute(): void;
}