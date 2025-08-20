<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Containers;

use App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final readonly class Applicability
{
    public function __construct(
        private Schema\RecordContainers $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Containers\Applicability
    {
        return new Persistence\Record\Data\Containers\Applicability(
            $this->affected(),
            $this->cpe(),
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Record\Data\Wrappers\Affected>
     */
    private function affected(): ArrayCollection
    {
        $elements = [];

        foreach ($this->affectedProviders() as $providedBy => $affected) {
            foreach ($affected as $item) {
                $elements[] = (new Wrappers\Affected($providedBy, $item))->toPersistence();
            }
        }

        return new ArrayCollection($elements);
    }

    /**
     * @return array<string, Schema\Affected[]>
     */
    private function affectedProviders(): array
    {
        $providers = [
            $this->schema->cna->providerMetadata->orgId => $this->schema->cna->affected,
        ];

        foreach ($this->schema->adp ?? [] as $adp) {
            if (null === $adp->affected) {
                continue;
            }

            $providers[$adp->providerMetadata->orgId] = $adp->affected;
        }

        return $providers;
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Record\Data\Wrappers\CPE>|null
     */
    private function cpe(): ?ArrayCollection
    {
        $elements = [];

        foreach ($this->cpeProviders() as $providedBy => $cpe) {
            foreach ($cpe as $item) {
                $elements[] = (new Wrappers\CPE($providedBy, $item))->toPersistence();
            }
        }

        if (0 === count($elements)) {
            return null;
        }

        return new ArrayCollection($elements);
    }

    /**
     * @return array<string, Schema\CPEApplicability[]>
     */
    private function cpeProviders(): array
    {
        if (null === $this->schema->cna?->cpeApplicability) {
            $providers = [];
        } else {
            $providers = [
                $this->schema->cna->providerMetadata->orgId => $this->schema->cna->cpeApplicability,
            ];
        }

        foreach ($this->schema->adp ?? [] as $adp) {
            if (null === $adp->cpeApplicability) {
                continue;
            }

            $providers[$adp->providerMetadata->orgId] = $adp->cpeApplicability;
        }

        return $providers;
    }
}
