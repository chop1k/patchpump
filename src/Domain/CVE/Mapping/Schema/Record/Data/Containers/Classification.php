<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data\Containers;

use App\Domain\CVE\Mapping\Schema\Record\Data\Wrappers;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final readonly class Classification
{
    public function __construct(
        private Schema\RecordContainers $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Containers\Classification
    {
        return new Persistence\Record\Data\Containers\Classification(
            $this->tags(),
            $this->taxonomies(),
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Record\Data\Wrappers\Tags>|null
     */
    private function tags(): ?ArrayCollection
    {
        $elements = [];

        foreach ($this->tagsProviders() as $providedBy => $tags) {
            $elements[] = (new Wrappers\Tags($providedBy, $tags))->toPersistence();
        }

        if (0 === count($elements)) {
            return null;
        }

        return new ArrayCollection($elements);
    }

    /**
     * @return array<string, string[]>
     */
    private function tagsProviders(): array
    {
        if (null === $this->schema->cna?->tags) {
            $providers = [];
        } else {
            $providers = [
                $this->schema->cna->providerMetadata->orgId => $this->schema->cna->tags,
            ];
        }

        foreach ($this->schema->adp ?? [] as $adp) {
            if (null === $adp->tags) {
                continue;
            }

            $providers[$adp->providerMetadata->orgId] = $adp->tags;
        }

        return $providers;
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Record\Data\Wrappers\Taxonomy>|null
     */
    private function taxonomies(): ?ArrayCollection
    {
        $elements = [];

        foreach ($this->taxonomiesProviders() as $providedBy => $taxonomies) {
            foreach ($taxonomies as $item) {
                $elements[] = (new Wrappers\Taxonomy($providedBy, $item))->toPersistence();
            }
        }

        if (0 === count($elements)) {
            return null;
        }

        return new ArrayCollection($elements);
    }

    private function taxonomiesProviders(): array
    {
        if (null === $this->schema->cna?->taxonomyMappings) {
            $providers = [];
        } else {
            $providers = [
                $this->schema->cna->providerMetadata->orgId => $this->schema->cna->taxonomyMappings,
            ];
        }

        foreach ($this->schema->adp ?? [] as $adp) {
            if (null === $adp->taxonomyMappings) {
                continue;
            }

            $providers[$adp->providerMetadata->orgId] = $adp->taxonomyMappings;
        }

        return $providers;
    }
}
