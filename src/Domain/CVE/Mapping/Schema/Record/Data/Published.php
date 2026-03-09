<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data;

use App\Domain\CVE\Schema;
use Doctrine\Common\Collections\ArrayCollection;

final readonly class Published
{
    public function __construct(
        private Schema\RecordContainers $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Published
    {
        return new \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Published(
            $this->providers(),
            $this->summary(),
            $this->applicability(),
            $this->history(),
            $this->classification(),
            $this->metrics(),
        );
    }

    /**
     * @return ArrayCollection<non-negative-int, \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Provider\Published>
     */
    private function providers(): ArrayCollection
    {
        $elements = array_map(
            static fn (Schema\CNA $provider) => new Provider\Published($provider)->toPersistence(),
            [
                $this->schema->cna,
                ...($this->schema->adp ?? []),
            ]
        );

        return new ArrayCollection($elements);
    }

    private function summary(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Containers\Summary
    {
        return new Containers\Summary($this->schema)->toPersistence();
    }

    private function applicability(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Containers\Applicability
    {
        return new Containers\Applicability($this->schema)->toPersistence();
    }

    private function history(): ?\App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Containers\History
    {
        return new Containers\History($this->schema)->toPersistence();
    }

    private function classification(): ?\App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Containers\Classification
    {
        return new Containers\Classification($this->schema)->toPersistence();
    }

    private function metrics(): ?\App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Containers\Metrics
    {
        return new Containers\Metrics($this->schema)->toPersistence();
    }
}
