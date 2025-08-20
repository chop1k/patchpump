<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Containers;

use App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final readonly class Summary
{
    public function __construct(
        private Schema\RecordContainers $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Containers\Summary
    {
        return new Persistence\Record\Data\Containers\Summary(
            $this->titles(),
            $this->descriptions(),
            $this->references(),
            $this->problems(),
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Record\Data\Wrappers\Title>
     */
    private function titles(): ArrayCollection
    {
        $elements = [];

        foreach ($this->titlesProviders() as $providedBy => $title) {
            $elements[] = (new Wrappers\Title($providedBy, $title))->toPersistence();
        }

        return new ArrayCollection($elements);
    }

    /**
     * @return array<string, string>
     */
    private function titlesProviders(): array
    {
        if (null === $this->schema->cna?->title) {
            $providers = [];
        } else {
            $providers = [
                $this->schema->cna->providerMetadata->orgId => $this->schema->cna->title,
            ];
        }

        foreach ($this->schema->adp ?? [] as $adp) {
            if (null === $adp->title) {
                continue;
            }

            $providers[$adp->providerMetadata->orgId] = $adp->title;
        }

        return $providers;
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Record\Data\Wrappers\Description>
     */
    private function descriptions(): ArrayCollection
    {
        return new ArrayCollection();
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Record\Data\Wrappers\Reference>|null
     */
    private function references(): ?ArrayCollection
    {
        $elements = [];

        foreach ($this->referencesProviders() as $providedBy => $references) {
            foreach ($references as $reference) {
                $elements[] = (new Wrappers\Reference($providedBy, $reference))->toPersistence();
            }
        }

        if (0 === count($elements)) {
            return null;
        }

        return new ArrayCollection($elements);
    }

    /**
     * @return array<string, Schema\Reference[]>
     */
    private function referencesProviders(): array
    {
        if (null === $this->schema->cna?->references) {
            $providers = [];
        } else {
            $providers = [
                $this->schema->cna->providerMetadata->orgId => $this->schema->cna->references,
            ];
        }

        foreach ($this->schema->adp ?? [] as $adp) {
            if (null === $adp->references) {
                continue;
            }

            $providers[$adp->providerMetadata->orgId] = $adp->references;
        }

        return $providers;
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Record\Data\Wrappers\Problem>|null
     */
    private function problems(): ?ArrayCollection
    {
        $elements = [];

        foreach ($this->problemsProviders() as $providedBy => $problems) {
            foreach ($problems as $problem) {
                $elements[] = (new Wrappers\Problem($providedBy, $problem))->toPersistence();
            }
        }

        if (0 === count($elements)) {
            return null;
        }

        return new ArrayCollection($elements);
    }

    /**
     * @return array<string, Schema\ProblemType[]>
     */
    private function problemsProviders(): array
    {
        if (null === $this->schema->cna?->problemTypes) {
            $providers = [];
        } else {
            $providers = [
                $this->schema->cna->providerMetadata->orgId => $this->schema->cna->problemTypes,
            ];
        }

        foreach ($this->schema->adp ?? [] as $adp) {
            if (null === $adp->problemTypes) {
                continue;
            }

            $providers[$adp->providerMetadata->orgId] = $adp->problemTypes;
        }

        return $providers;
    }
}
