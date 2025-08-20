<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Containers;

use App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final readonly class History
{
    public function __construct(
        private Schema\RecordContainers $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Containers\History
    {
        return new Persistence\Record\Data\Containers\History(
            $this->timelines(),
            $this->credits(),
            $this->sources(),
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Record\Data\Wrappers\Timeline>|null
     */
    private function timelines(): ?ArrayCollection
    {
        $elements = [];

        foreach ($this->timelinesProviders() as $providedBy => $timeline) {
            foreach ($timeline as $item) {
                $elements[] = (new Wrappers\Timeline($providedBy, $item))->toPersistence();
            }
        }

        if (0 === count($elements)) {
            return null;
        }

        return new ArrayCollection($elements);
    }

    /**
     * @return array<string, Schema\Timeline[]>
     */
    private function timelinesProviders(): array
    {
        if (null === $this->schema->cna?->timeline) {
            $providers = [];
        } else {
            $providers = [
                $this->schema->cna->providerMetadata->orgId => $this->schema->cna->timeline,
            ];
        }

        foreach ($this->schema->adp ?? [] as $adp) {
            if (null === $adp->timeline) {
                continue;
            }

            $providers[$adp->providerMetadata->orgId] = $adp->timeline;
        }

        return $providers;
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Record\Data\Wrappers\Credit>|null
     */
    private function credits(): ?ArrayCollection
    {
        $elements = [];

        foreach ($this->creditProviders() as $providedBy => $credits) {
            foreach ($credits as $item) {
                $elements[] = (new Wrappers\Credit($providedBy, $item))->toPersistence();
            }
        }

        if (0 === count($elements)) {
            return null;
        }

        return new ArrayCollection($elements);
    }

    /**
     * @return array<string, Schema\Credit[]>
     */
    private function creditProviders(): array
    {
        if (null === $this->schema->cna?->credits) {
            $providers = [];
        } else {
            $providers = [
                $this->schema->cna->providerMetadata->orgId => $this->schema->cna->credits,
            ];
        }

        foreach ($this->schema->adp ?? [] as $adp) {
            if (null === $adp->credits) {
                continue;
            }

            $providers[$adp->providerMetadata->orgId] = $adp->credits;
        }

        return $providers;
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Record\Data\Wrappers\Source>|null
     */
    private function sources(): ?ArrayCollection
    {
        $elements = [];

        foreach ($this->sourcesProviders() as $providedBy => $source) {
            $elements[] = (new Wrappers\Source($providedBy, $source))->toPersistence();
        }

        if (0 === count($elements)) {
            return null;
        }

        return new ArrayCollection($elements);
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    private function sourcesProviders(): array
    {
        if (null === $this->schema->cna?->source) {
            $providers = [];
        } else {
            $providers = [
                $this->schema->cna->providerMetadata->orgId => $this->schema->cna->source,
            ];
        }

        foreach ($this->schema->adp ?? [] as $adp) {
            if (null === $adp->source) {
                continue;
            }

            $providers[$adp->providerMetadata->orgId] = $adp->source;
        }

        return $providers;
    }
}
