<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL;

use App\Infrastructure\Persistence\Storage\SQL\Contracts\Request\SQLNameInterface;
use Override;

/**
 * @psalm-type StaticString = non-empty-string&literal-string
 */
final readonly class SQLName implements SQLNameInterface
{
    public function __construct(
        /**
         * @var StaticString $engine
         */
        private string $engine,
        /**
         * @var StaticString $name
         */
        private string $name,
    ) {
    }

    #[Override]
    public function engine(): string
    {
        return $this->engine;
    }

    #[Override]
    public function floors(): array
    {
        return explode('.', $this->name);
    }
}
