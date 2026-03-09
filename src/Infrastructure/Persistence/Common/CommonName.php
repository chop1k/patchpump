<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Common;

use App\Infrastructure\Persistence\Contracts\Request\NameInterface;
use Override;

/**
 * @psalm-type StaticString = non-empty-string&literal-string
 */
abstract readonly class CommonName implements NameInterface
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
