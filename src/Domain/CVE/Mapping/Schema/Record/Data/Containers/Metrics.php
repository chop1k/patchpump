<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Containers;

use App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final readonly class Metrics
{
    public function __construct(
        private Schema\RecordContainers $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Containers\Metrics
    {
        return new Persistence\Record\Data\Containers\Metrics(
            $this->metrics()
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, Wrappers\Metric>
     */
    private function metrics(): ArrayCollection
    {
        $elements = [];

        foreach ($this->metricsProviders() as $providedBy => $metrics) {
            foreach ($metrics as $metric) {
                $elements[] = (new Wrappers\Metric($providedBy, $metric))->toPersistence();
            }
        }

        return new ArrayCollection($elements);
    }

    /**
     * @return array<string, Schema\Metric[]>
     */
    private function metricsProviders(): array
    {
        if (null === $this->schema->cna?->metrics) {
            $providers = [];
        } else {
            $providers = [
                $this->schema->cna->providerMetadata->orgId => $this->schema->cna->metrics,
            ];
        }

        foreach ($this->schema->adp ?? [] as $adp) {
            if (null === $adp->metrics) {
                continue;
            }

            $providers[$adp->providerMetadata->orgId] = $adp->metrics;
        }

        return $providers;
    }
}
