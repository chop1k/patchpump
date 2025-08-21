<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Containers\Common;

use App\Domain\CVE\Schema;

/**
 * @template T
 */
final readonly class ProviderCollection
{
    public function __construct(
        private Schema\RecordContainers $schema,
        /**
         * @var \Closure(Schema\CNA): ?T $factory
         */
        private \Closure $factory,
    ) {
    }

    /**
     * @return array<string, T>
     */
    public function toArray(): array
    {
        $providers = [
            $this->schema->cna->providerMetadata->orgId => ($this->factory)($this->schema->cna),
        ];

        foreach ($this->schema->adp ?? [] as $adp) {
            $id = $adp?->providerMetadata?->orgId;

            if (null === $id) {
                continue;
            }

            $value = ($this->factory)($adp);

            if (null !== $value) {
                $providers[$id] = $value;
            }
        }

        return $providers;
    }
}
