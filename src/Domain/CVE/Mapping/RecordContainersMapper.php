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

    public static function mapSchemaCNAToPersistenceRejected(?Schema\CNA $schema): ?Persistence\RejectedCNA
    {
        if (null === $schema) {
            return null;
        }

        $persistence = new Persistence\RejectedCNA();

        $persistence->setProvider(
            ProviderMetadataMapper::mapSchemaToPersistence($schema->providerMetadata),
        );

        $persistence->setReplacedBy($schema->replacedBy);

        if ($schema->rejectedReasons !== null) {
            $persistence->setReasons(
                new ArrayCollection(
                    array_map(DescriptionMapper::mapSchemaPlainToPersistence(...), $schema->rejectedReasons),
                ),
            );
        }

        return $persistence;
    }

    private static function mapSchemaCommonCNAToPersistence(Persistence\PublishedCNA|Persistence\ADP $persistence, ?Schema\CNA $schema): Persistence\PublishedCNA|Persistence\ADP
    {
        $persistence->setTitle($schema->title);
        $persistence->setProvider(
            ProviderMetadataMapper::mapSchemaToPersistence($schema->providerMetadata),
        );

        $descriptions = array_merge(
            array_map(DescriptionMapper::mapSchemaPlainToPersistence(...), $schema->descriptions ?? []),
            array_map(DescriptionMapper::mapSchemaConfigurationToPersistence(...), $schema->configurations ?? []),
            array_map(DescriptionMapper::mapSchemaWorkaroundToPersistence(...), $schema->workarounds ?? []),
            array_map(DescriptionMapper::mapSchemaSolutionToPersistence(...), $schema->solutions ?? []),
            array_map(DescriptionMapper::mapSchemaExploitToPersistence(...), $schema->exploits ?? []),
        );

        if (count($descriptions) > 0) {
            $persistence->setDescriptions(
                new ArrayCollection($descriptions),
            );
        } else {
            unset($descriptions);
        }

        if ($schema->affected !== null) {
            $persistence->setAffected(
                new ArrayCollection(
                    array_map(AffectedMapper::mapSchemaToPersistence(...), $schema->affected),
                ),
            );
        }

        if ($schema->cpeApplicability !== null) {
            $persistence->setCpeApplicability(
                new ArrayCollection(
                    array_map(CPEApplicabilityMapper::mapSchemaToPersistence(...), $schema->cpeApplicability),
                ),
            );
        }

        if ($schema->problemTypes !== null) {
            $problems = array_map(ProblemMapper::mapSchemaToPersistence(...), $schema->problemTypes);

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
            $persistence->setReferences(
                new ArrayCollection(
                    array_map(ReferenceMapper::mapSchemaToPersistence(...), $schema->references),
                ),
            );
        }

        if ($schema->metrics !== null) {
            $persistence->setMetrics(
                new ArrayCollection(
                    array_map(MetricMapper::mapSchemaToPersistence(...), $schema->metrics),
                ),
            );
        }

        if ($schema->timeline !== null) {
            $persistence->setTimeline(
                new ArrayCollection(
                    array_map(TimelineMapper::mapSchemaToPersistence(...), $schema->timeline),
                ),
            );
        }

        if ($schema->credits !== null) {
            $persistence->setCredits(
                new ArrayCollection(
                    array_map(CreditMapper::mapSchemaToPersistence(...), $schema->credits),
                ),
            );
        }

        $persistence->setSource($schema->source);
        $persistence->setTags($schema->tags);

        if ($schema->taxonomyMappings !== null) {
            $persistence->setTaxonomyMappings(
                new ArrayCollection(
                    array_map(TaxonomyMappingMapper::mapSchemaToPersistence(...), $schema->taxonomyMappings),
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