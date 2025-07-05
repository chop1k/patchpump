<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
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

        if ($schema->providerMetadata !== null) {
            $persistence->setProvider(
                ProviderMetadataMapper::mapSchemaToPersistence($schema->providerMetadata),
            );
        }

        if ($schema->replacedBy !== null) {
            $filtered = array_filter(
                $schema->replacedBy,
                static fn (mixed $replaced) => is_string($replaced),
            );

            $persistence->setReplacedBy($filtered);
        }

        if ($schema->rejectedReasons !== null) {
            $filtered = array_filter(
                $schema->rejectedReasons,
                static fn (mixed $reason) => is_object($reason) && get_class($reason) === Schema\Description::class,
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
     * @param Schema\CNA $schema
     *
     * @return Persistence\PublishedCNA|Persistence\ADP
     */
    private static function mapSchemaCommonCNAToPersistence(mixed $persistence, Schema\CNA $schema): mixed
    {
        $persistence->setTitle($schema->title);

        if ($schema->providerMetadata!== null) {
            $persistence->setProvider(
                ProviderMetadataMapper::mapSchemaToPersistence($schema->providerMetadata),
            );
        }

        $descriptions = [];

        if ($schema->descriptions !== null) {
            $filtered = array_filter(
                $schema->descriptions,
                static fn (mixed $desc) => is_object($desc) && get_class($desc) === Schema\Description::class,
            );

            $descriptions = array_merge(
                $descriptions,
                array_map(DescriptionMapper::mapSchemaPlainToPersistence(...), $filtered)
            );
        }

        if ($schema->configurations !== null) {
            $filtered = array_filter(
                $schema->configurations,
                static fn (mixed $desc) => is_object($desc) && get_class($desc) === Schema\Description::class,
            );

            $descriptions = array_merge(
                $descriptions,
                array_map(DescriptionMapper::mapSchemaConfigurationToPersistence(...), $filtered)
            );
        }

        if ($schema->workarounds !== null) {
            $filtered = array_filter(
                $schema->workarounds,
                static fn (mixed $desc) => is_object($desc) && get_class($desc) === Schema\Description::class,
            );

            $descriptions = array_merge(
                $descriptions,
                array_map(DescriptionMapper::mapSchemaWorkaroundToPersistence(...), $filtered)
            );
        }

        if ($schema->solutions !== null) {
            $filtered = array_filter(
                $schema->solutions,
                static fn (mixed $desc) => is_object($desc) && get_class($desc) === Schema\Description::class,
            );

            $descriptions = array_merge(
                $descriptions,
                array_map(DescriptionMapper::mapSchemaSolutionToPersistence(...), $filtered)
            );
        }

        if ($schema->exploits !== null) {
            $filtered = array_filter(
                $schema->exploits,
                static fn (mixed $desc) => is_object($desc) && get_class($desc) === Schema\Description::class,
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

        if ($schema->affected !== null) {
            $filtered = array_filter(
                $schema->affected,
                static fn (mixed $affected) => is_object($affected) && get_class($affected) === Schema\Affected::class,
            );

            $persistence->setAffected(
                new ArrayCollection(
                    array_map(AffectedMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        if ($schema->cpeApplicability !== null) {
            $filtered = array_filter(
                $schema->cpeApplicability,
                static fn (mixed $cpe) => is_object($cpe) && get_class($cpe) === Schema\CPEApplicability::class,
            );

            $persistence->setCpeApplicability(
                new ArrayCollection(
                    array_map(CPEApplicabilityMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        if ($schema->problemTypes !== null) {
            $filtered = array_filter(
                $schema->problemTypes,
                static fn (mixed $cpe) => is_object($cpe) && get_class($cpe) === Schema\ProblemType::class,
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

        if ($schema->references !== null) {
            $filtered = array_filter(
                $schema->references,
                static fn (mixed $ref) => is_object($ref) && get_class($ref) === Schema\Reference::class,
            );

            $persistence->setReferences(
                new ArrayCollection(
                    array_map(ReferenceMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        if ($schema->metrics !== null) {
            $filtered = array_filter(
                $schema->metrics,
                static fn (mixed $metric) => is_object($metric) && get_class($metric) === Schema\Metric::class,
            );

            $persistence->setMetrics(
                new ArrayCollection(
                    array_map(MetricMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        if ($schema->timeline !== null) {
            $filtered = array_filter(
                $schema->timeline,
                static fn (mixed $timeline) => is_object($timeline) && get_class($timeline) === Schema\Timeline::class,
            );

            $persistence->setTimeline(
                new ArrayCollection(
                    array_map(TimelineMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        if ($schema->credits !== null) {
            $filtered = array_filter(
                $schema->credits,
                static fn (mixed $credit) => is_object($credit) && get_class($credit) === Schema\Credit::class,
            );

            $persistence->setCredits(
                new ArrayCollection(
                    array_map(CreditMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        $persistence->setSource($schema->source);
        $persistence->setTags($schema->tags);

        if ($schema->taxonomyMappings !== null) {
            $filtered = array_filter(
                $schema->taxonomyMappings,
                static fn (mixed $tax) => is_object($tax) && get_class($tax) === Schema\TaxonomyMapping::class,
            );

            $persistence->setTaxonomyMappings(
                new ArrayCollection(
                    array_map(TaxonomyMappingMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        if ($schema->datePublic !== null) {
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

        if ($schema->dateAssigned !== null) {
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