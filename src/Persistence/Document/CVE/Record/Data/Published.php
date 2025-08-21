<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Record\Data;

use App\Persistence\Document\CVE\Record\Data\Containers\Applicability;
use App\Persistence\Document\CVE\Record\Data\Containers\Classification;
use App\Persistence\Document\CVE\Record\Data\Containers\History;
use App\Persistence\Document\CVE\Record\Data\Containers\Metrics;
use App\Persistence\Document\CVE\Record\Data\Containers\Summary;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Published
{
    public function __construct(
        /**
         * @var Collection<non-negative-int, Provider\Published> $providers
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'provider' => Provider\Published::class,
            ]
        )]
        private Collection $providers,

        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'summary' => Summary::class,
            ]
        )]
        private Summary $summary,

        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'applicability' => Applicability::class,
            ]
        )]
        private Applicability $applicability,

        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'history' => History::class,
            ]
        )]
        private ?History $history,

        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'classification' => Classification::class,
            ]
        )]
        private ?Classification $classification,

        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'metrics' => Metrics::class,
            ]
        )]
        private ?Metrics $metrics,
    ) {
    }

    public function providers(): Collection
    {
        return $this->providers;
    }

    public function summary(): Summary
    {
        return $this->summary;
    }

    public function applicability(): Applicability
    {
        return $this->applicability;
    }

    public function history(): ?History
    {
        return $this->history;
    }

    public function classification(): ?Classification
    {
        return $this->classification;
    }

    public function metrics(): ?Metrics
    {
        return $this->metrics;
    }
}
