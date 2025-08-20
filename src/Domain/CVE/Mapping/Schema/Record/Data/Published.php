<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final readonly class Published
{
    public function __construct(
        private Schema\RecordContainers $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Published
    {
        return new Persistence\Record\Data\Published(
            $this->providers(),
            $this->summary(),
            $this->applicability(),
            $this->history(),
            $this->classification(),
            $this->metrics(),
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Record\Data\Provider\Published>
     */
    private function providers(): ArrayCollection
    {
        $elements = array_map(
            static fn (Schema\CNA $provider) => (new Provider\Published($provider))->toPersistence(),
            [
                $this->schema->cna,
                ...($this->schema->adp ?? []),
            ]
        );

        return new ArrayCollection($elements);
    }

    private function summary(): Persistence\Record\Data\Containers\Summary
    {
        return (new Containers\Summary($this->schema))->toPersistence();
    }

    private function applicability(): Persistence\Record\Data\Containers\Applicability
    {
        return (new Containers\Applicability($this->schema))->toPersistence();
    }

    private function history(): Persistence\Record\Data\Containers\History
    {
        return (new Containers\History($this->schema))->toPersistence();
    }

    private function classification(): Persistence\Record\Data\Containers\Classification
    {
        return (new Containers\Classification($this->schema))->toPersistence();
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Record\Data\Wrappers\Metric>
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
