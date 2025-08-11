<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Common\ChaoticCollection;
use App\Domain\CVE\Mapping\Common\Timestamp;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\DescriptionType;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @internal
 */
final readonly class RecordContainers
{
    public function __construct(
        private Schema\CNA $schema,
    ) {
    }

    /**
     * @param Persistence\PublishedCNA|Persistence\ADP $persistence
     *
     * @return Persistence\PublishedCNA|Persistence\ADP
     */
    private function mapCommon(mixed $persistence): mixed
    {
        $persistence->setTitle($this->schema->title);

        if (null !== $this->schema->providerMetadata) {
            $mapping = new RecordProvider($this->schema->providerMetadata);

            $persistence->setProvider($mapping->toPersistence());
        }

        $descriptions = [];

        if (null !== $this->schema->descriptions) {
            $plain = new ChaoticCollection(
                $this->schema->descriptions,
                $this->mapPlainDescription(...),
            );

            $plain = $plain
                ->ensureInstanceOf(Schema\Description::class)
                ->map()
                ->toArray();

            $descriptions = array_merge($descriptions, $plain);
        }

        if (null !== $this->schema->configurations) {
            $configurations = new ChaoticCollection(
                $this->schema->descriptions,
                $this->mapConfigurationDescription(...),
            );

            $configurations = $configurations
                ->ensureInstanceOf(Schema\Description::class)
                ->map()
                ->toArray();

            $descriptions = array_merge($descriptions, $configurations);
        }

        if (null !== $this->schema->workarounds) {
            $workarounds = new ChaoticCollection(
                $this->schema->descriptions,
                $this->mapWorkaroundDescription(...),
            );

            $workarounds = $workarounds
                ->ensureInstanceOf(Schema\Description::class)
                ->map()
                ->toArray();

            $descriptions = array_merge($descriptions, $workarounds);
        }

        if (null !== $this->schema->solutions) {
            $solutions = new ChaoticCollection(
                $this->schema->descriptions,
                $this->mapSolutionDescription(...),
            );

            $solutions = $solutions
                ->ensureInstanceOf(Schema\Description::class)
                ->map()
                ->toArray();

            $descriptions = array_merge($descriptions, $solutions);
        }

        if (null !== $this->schema->exploits) {
            $exploits = new ChaoticCollection(
                $this->schema->descriptions,
                $this->mapExploitDescription(...),
            );

            $exploits = $exploits
                ->ensureInstanceOf(Schema\Description::class)
                ->map()
                ->toArray();

            $descriptions = array_merge($descriptions, $exploits);
        }

        if (count($descriptions) > 0) {
            $persistence->setDescriptions(
                new ArrayCollection($descriptions),
            );
        } else {
            unset($descriptions);
        }

        if (null !== $this->schema->affected) {
            $affected = new ChaoticCollection(
                $this->schema->affected,
                $this->mapAffected(...),
            );

            $affected = $affected
                ->ensureInstanceOf(Schema\Affected::class)
                ->map()
                ->toArrayCollection();

            $persistence->setAffected($affected);
        }

        if (null !== $this->schema->cpeApplicability) {
            $cpes = new ChaoticCollection(
                $this->schema->cpeApplicability,
                $this->mapCPE(...),
            );

            $cpes = $cpes
                ->ensureInstanceOf(Schema\CPEApplicability::class)
                ->map()
                ->toArrayCollection();

            $persistence->setCPEApplicability($cpes);
        }

        if (null !== $this->schema->problemTypes) {
            $problems = new ChaoticCollection(
                $this->schema->problemTypes,
                $this->mapProblem(...),
            );

            $problems = $problems
                ->ensureInstanceOf(Schema\ProblemType::class)
                ->map()
                ->toArrayCollection();

            $persistence->setProblems($problems);
        }

        if (null !== $this->schema->references) {
            $references = new ChaoticCollection(
                $this->schema->references,
                $this->mapReference(...),
            );

            $references = $references
                ->ensureInstanceOf(Schema\Reference::class)
                ->map()
                ->toArrayCollection();

            $persistence->setReferences($references);
        }

        if (null !== $this->schema->metrics) {
            $metrics = new ChaoticCollection(
                $this->schema->metrics,
                $this->mapMetric(...),
            );

            $metrics = $metrics
                ->ensureInstanceOf(Schema\Metric::class)
                ->map()
                ->toArrayCollection();

            $persistence->setMetrics($metrics);
        }

        if (null !== $this->schema->timeline) {
            $timelines = new ChaoticCollection(
                $this->schema->timeline,
                $this->mapTimeline(...),
            );

            $timelines = $timelines
                ->ensureInstanceOf(Schema\Timeline::class)
                ->map()
                ->toArrayCollection();

            $persistence->setTimelines($timelines);
        }

        if (null !== $this->schema->credits) {
            $credits = new ChaoticCollection(
                $this->schema->credits,
                $this->mapCredit(...),
            );

            $credits = $credits
                ->ensureInstanceOf(Schema\Credit::class)
                ->map()
                ->toArrayCollection();

            $persistence->setCredits($credits);
        }

        $persistence->setSource($this->schema->source);
        $persistence->setTags($this->schema->tags);

        if (null !== $this->schema->taxonomyMappings) {
            $mappings = new ChaoticCollection(
                $this->schema->taxonomyMappings,
                $this->mapTaxonomy(...),
            );

            $mappings = $mappings
                ->ensureInstanceOf(Schema\TaxonomyMapping::class)
                ->map()
                ->toArrayCollection();

            $persistence->setMappings($mappings);
        }

        if (null !== $this->schema->datePublic) {
            $timestamp = new Timestamp($this->schema->datePublic);

            try {
                $persistence->setDatePublic($timestamp->toDateTimeImmutable());
            } catch (\InvalidArgumentException) {
                $persistence->setDatePublic(null);
            }
        }

        return $persistence;
    }

    public function toPersistenceADP(): Persistence\ADP
    {
        return $this->mapCommon(
            new Persistence\ADP(),
        );
    }

    public function toPersistencePublishedCNA(): Persistence\PublishedCNA
    {
        $persistence = new Persistence\PublishedCNA();

        if (null !== $this->schema->dateAssigned) {
            $timestamp = new Timestamp($this->schema->dateAssigned);

            try {
                $persistence->setAssignedAt($timestamp->toDateTimeImmutable());
            } catch (\InvalidArgumentException) {
                $persistence->setAssignedAt(null);
            }
        }

        return $this->mapCommon($persistence);
    }

    public function toPersistenceRejectedCNA(): Persistence\RejectedCNA
    {
        $persistence = new Persistence\RejectedCNA();

        if (null !== $this->schema->providerMetadata) {
            $mapping = new RecordProvider($this->schema->providerMetadata);

            $persistence->setProvider($mapping->toPersistence());
        }

        if (null !== $this->schema->replacedBy) {
            $filtered = array_filter($this->schema->replacedBy, 'is_string');

            $persistence->setReplacedBy($filtered);
        }

        if (null !== $this->schema->rejectedReasons) {
            $reasons = new ChaoticCollection(
                $this->schema->rejectedReasons,
                $this->mapPlainDescription(...),
            );

            $reasons = $reasons
                ->ensureInstanceOf(Schema\Description::class)
                ->map()
                ->toArrayCollection();

            $persistence->setReasons($reasons);
        }

        return $persistence;
    }

    private function mapProblem(Schema\ProblemType $problem): Persistence\ProblemType
    {
        $mapping = new Problem($problem);

        return $mapping->toPersistence();
    }

    private function mapMetric(Schema\Metric $metric): Persistence\Metric
    {
        $mapping = new Metric($metric);

        return $mapping->toPersistence();
    }

    private function mapTaxonomy(Schema\TaxonomyMapping $taxonomy): Persistence\TaxonomyMapping
    {
        $mapping = new TaxonomyMapping($taxonomy);

        return $mapping->toPersistence();
    }

    private function mapReference(Schema\Reference $reference): Persistence\Reference
    {
        $mapping = new Reference($reference);

        return $mapping->toPersistence();
    }

    private function mapTimeline(Schema\Timeline $timeline): Persistence\Timeline
    {
        $mapping = new Timeline($timeline);

        return $mapping->toPersistence();
    }

    private function mapCPE(Schema\CPEApplicability $cpe): Persistence\CPEApplicability
    {
        $mapping = new CPEApplicability($cpe);

        return $mapping->toPersistence();
    }

    private function mapCredit(Schema\Credit $credit): Persistence\Credit
    {
        $mapping = new Credit($credit);

        return $mapping->toPersistence();
    }

    private function mapAffected(Schema\Affected $affected): Persistence\Affected
    {
        $mapping = new Affected($affected);

        return $mapping->toPersistence();
    }

    private function mapPlainDescription(Schema\Description $description): Persistence\Description
    {
        $mapping = new Description($description, DescriptionType::Plain);

        return $mapping->toPersistence();
    }

    private function mapConfigurationDescription(Schema\Description $description): Persistence\Description
    {
        $mapping = new Description($description, DescriptionType::Configuration);

        return $mapping->toPersistence();
    }

    private function mapWorkaroundDescription(Schema\Description $description): Persistence\Description
    {
        $mapping = new Description($description, DescriptionType::Workaround);

        return $mapping->toPersistence();
    }

    private function mapSolutionDescription(Schema\Description $description): Persistence\Description
    {
        $mapping = new Description($description, DescriptionType::Solution);

        return $mapping->toPersistence();
    }

    private function mapExploitDescription(Schema\Description $description): Persistence\Description
    {
        $mapping = new Description($description, DescriptionType::Exploit);

        return $mapping->toPersistence();
    }
}
