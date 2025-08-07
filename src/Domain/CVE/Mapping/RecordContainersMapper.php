<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;

final class RecordContainersMapper
{
    public static function mapPersistenceADPToSchema(): Schema\CNA
    {
    }

    public static function mapSchemaCNAToPersistenceRejected(Schema\CNA $schema): Persistence\RejectedCNA
    {
        $persistence = new Persistence\RejectedCNA();

        if (null !== $schema->providerMetadata) {
            $persistence->setProvider(
                ProviderMetadataMapper::mapSchemaToPersistence($schema->providerMetadata),
            );
        }

        if (null !== $schema->replacedBy) {
            $filtered = array_filter(
                $schema->replacedBy,
                static fn (mixed $replaced) => is_string($replaced),
            );

            $persistence->setReplacedBy($filtered);
        }

        if (null !== $schema->rejectedReasons) {
            $filtered = array_filter(
                $schema->rejectedReasons,
                static fn (mixed $reason) => is_object($reason) && Schema\Description::class === get_class($reason),
            );

            $persistence->setReasons(
                new ArrayCollection(
                    array_map(DescriptionMapper::mapSchemaPlainToPersistence(...), $filtered),
                ),
            );
        }

        return $persistence;
    }

    /**
     * @param Persistence\PublishedCNA|Persistence\ADP $persistence
     *
     * @return Persistence\PublishedCNA|Persistence\ADP
     */
    private static function mapSchemaCommonCNAToPersistence(mixed $persistence, Schema\CNA $schema): mixed
    {
        $persistence->setTitle($schema->title);

        if (null !== $schema->providerMetadata) {
            $persistence->setProvider(
                ProviderMetadataMapper::mapSchemaToPersistence($schema->providerMetadata),
            );
        }

        $descriptions = [];

        if (null !== $schema->descriptions) {
            $filtered = array_filter(
                $schema->descriptions,
                static fn (mixed $desc) => is_object($desc) && Schema\Description::class === get_class($desc),
            );

            $descriptions = array_merge(
                $descriptions,
                array_map(DescriptionMapper::mapSchemaPlainToPersistence(...), $filtered)
            );
        }

        if (null !== $schema->configurations) {
            $filtered = array_filter(
                $schema->configurations,
                static fn (mixed $desc) => is_object($desc) && Schema\Description::class === get_class($desc),
            );

            $descriptions = array_merge(
                $descriptions,
                array_map(DescriptionMapper::mapSchemaConfigurationToPersistence(...), $filtered)
            );
        }

        if (null !== $schema->workarounds) {
            $filtered = array_filter(
                $schema->workarounds,
                static fn (mixed $desc) => is_object($desc) && Schema\Description::class === get_class($desc),
            );

            $descriptions = array_merge(
                $descriptions,
                array_map(DescriptionMapper::mapSchemaWorkaroundToPersistence(...), $filtered)
            );
        }

        if (null !== $schema->solutions) {
            $filtered = array_filter(
                $schema->solutions,
                static fn (mixed $desc) => is_object($desc) && Schema\Description::class === get_class($desc),
            );

            $descriptions = array_merge(
                $descriptions,
                array_map(DescriptionMapper::mapSchemaSolutionToPersistence(...), $filtered)
            );
        }

        if (null !== $schema->exploits) {
            $filtered = array_filter(
                $schema->exploits,
                static fn (mixed $desc) => is_object($desc) && Schema\Description::class === get_class($desc),
            );

            $descriptions = array_merge(
                $descriptions,
                array_map(DescriptionMapper::mapSchemaExploitToPersistence(...), $filtered)
            );
        }

        if (count($descriptions) > 0) {
            $persistence->setDescriptions(
                new ArrayCollection($descriptions),
            );
        } else {
            unset($descriptions);
        }

        if (null !== $schema->affected) {
            $filtered = array_filter(
                $schema->affected,
                static fn (mixed $affected) => is_object($affected) && Schema\Affected::class === get_class($affected),
            );

            $persistence->setAffected(
                new ArrayCollection(
                    array_map(AffectedMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        if (null !== $schema->cpeApplicability) {
            $filtered = array_filter(
                $schema->cpeApplicability,
                static fn (mixed $cpe) => is_object($cpe) && Schema\CPEApplicability::class === get_class($cpe),
            );

            $persistence->setCpeApplicability(
                new ArrayCollection(
                    array_map(CPEApplicabilityMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        if (null !== $schema->problemTypes) {
            $filtered = array_filter(
                $schema->problemTypes,
                static fn (mixed $cpe) => is_object($cpe) && Schema\ProblemType::class === get_class($cpe),
            );

            $problems = array_map(ProblemMapper::mapSchemaToPersistence(...), $filtered);

            $persistence->setProblems(
                new ArrayCollection(
                    array_merge(
                        ...array_map(
                            fn (int $index, array $descriptions) => array_map(
                                fn (Persistence\Problem $problem) => $problem->setIndex($index),
                                $descriptions,
                            ),
                            array_keys($problems),
                            array_values($problems),
                        )
                    )
                )
            );
        }

        if (null !== $schema->references) {
            $filtered = array_filter(
                $schema->references,
                static fn (mixed $ref) => is_object($ref) && Schema\Reference::class === get_class($ref),
            );

            $persistence->setReferences(
                new ArrayCollection(
                    array_map(ReferenceMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        if (null !== $schema->metrics) {
            $filtered = array_filter(
                $schema->metrics,
                static fn (mixed $metric) => is_object($metric) && Schema\Metric::class === get_class($metric),
            );

            $persistence->setMetrics(
                new ArrayCollection(
                    array_map(MetricMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        if (null !== $schema->timeline) {
            $filtered = array_filter(
                $schema->timeline,
                static fn (mixed $timeline) => is_object($timeline) && Schema\Timeline::class === get_class($timeline),
            );

            $persistence->setTimeline(
                new ArrayCollection(
                    array_map(TimelineMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        if (null !== $schema->credits) {
            $filtered = array_filter(
                $schema->credits,
                static fn (mixed $credit) => is_object($credit) && Schema\Credit::class === get_class($credit),
            );

            $persistence->setCredits(
                new ArrayCollection(
                    array_map(CreditMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        $persistence->setSource($schema->source);
        $persistence->setTags($schema->tags);

        if (null !== $schema->taxonomyMappings) {
            $filtered = array_filter(
                $schema->taxonomyMappings,
                static fn (mixed $tax) => is_object($tax) && Schema\TaxonomyMapping::class === get_class($tax),
            );

            $persistence->setTaxonomyMappings(
                new ArrayCollection(
                    array_map(TaxonomyMappingMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        if (null !== $schema->datePublic) {
            if (Carbon::canBeCreatedFromFormat($schema->datePublic, Schema\Timestamp::FormatWithTz)) {
                $persistence->setPublicAt(
                    Carbon::createFromFormat(Schema\Timestamp::FormatWithTz, $schema->datePublic)->toDateTimeImmutable(),
                );
            }
            if (Carbon::canBeCreatedFromFormat($schema->datePublic, Schema\Timestamp::Format)) {
                $persistence->setPublicAt(
                    Carbon::createFromFormat(Schema\Timestamp::Format, $schema->datePublic)->toDateTimeImmutable(),
                );
            }
        }

        return $persistence;
    }

    public static function mapSchemaCNAToPersistencePublished(?Schema\CNA $schema): ?Persistence\PublishedCNA
    {
        if (null === $schema) {
            return null;
        }

        $persistence = new Persistence\PublishedCNA();

        if (null !== $schema->dateAssigned) {
            if (Carbon::canBeCreatedFromFormat($schema->dateAssigned, Schema\Timestamp::FormatWithTz)) {
                $persistence->setAssignedAt(
                    Carbon::createFromFormat(Schema\Timestamp::FormatWithTz, $schema->dateAssigned)->toDateTimeImmutable(),
                );
            }
            if (Carbon::canBeCreatedFromFormat($schema->dateAssigned, Schema\Timestamp::Format)) {
                $persistence->setAssignedAt(
                    Carbon::createFromFormat(Schema\Timestamp::Format, $schema->dateAssigned)->toDateTimeImmutable(),
                );
            }
        }

        return self::mapSchemaCommonCNAToPersistence($persistence, $schema);
    }

    public static function mapSchemaADPToPersistence(?Schema\CNA $schema): ?Persistence\ADP
    {
        if (null === $schema) {
            return null;
        }

        return self::mapSchemaCommonCNAToPersistence(new Persistence\ADP(), $schema);
    }
}
