<?php

declare(strict_types=1);

namespace App\Domain\Vulnerabilities\Synchronization\Contracts;

/**
 * @template T
 */
interface SourceInterface
{
    /**
     * @return \Generator<string, T>
     */
    public function generator(): \Generator;
}
