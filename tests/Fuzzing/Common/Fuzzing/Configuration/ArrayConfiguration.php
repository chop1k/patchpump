<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Configuration;

use App\Tests\Fuzzing\Common\Fuzzing\Contracts\ConfigurationInterface;
use Override;

final readonly class ArrayConfiguration implements ConfigurationInterface
{
    public function __construct(
        /**
         * @var non-empty-array<string, non-empty-array<non-negative-int, mixed>> $configuration
         */
        private array $configuration,
    ) {
    }

    /**
     * @return non-empty-array<non-negative-int, string>
     */
    #[Override]
    public function fields(): array
    {
        return array_keys($this->configuration);
    }

    /**
     * @return non-empty-array<non-negative-int, non-empty-array<non-negative-int, mixed>>
     */
    #[Override]
    public function values(): array
    {
        return array_values($this->configuration);
    }
}
