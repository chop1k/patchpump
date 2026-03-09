<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\SQL;

use App\Persistence\SQL\Contracts\Request\NameInterface;
use Override;

final readonly class SQLName implements NameInterface
{
    /**
     * @return non-empty-string
     */
    #[Override]
    public function engine(): string
    {
    }

    /**
     * @return non-empty-array<non-negative-int, non-empty-string>
     */
    #[Override]
    public function floors(): array
    {
    }
}
