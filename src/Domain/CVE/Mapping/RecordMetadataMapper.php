<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\RecordState;
use Carbon\Carbon;

final class RecordMetadataMapper
{
    public static function mapSchemaToPersistenceMetadata(Schema\RecordMetadata $schema): Persistence\RecordMetadata
    {
        $persistence = new Persistence\RecordMetadata();

        if ('published' === strtolower($schema->state ?? '')) {
            $persistence->setState(RecordState::Published);
        }

        if ('rejected' === strtolower($schema->state ?? '')) {
            $persistence->setState(RecordState::Rejected);
        }

        $persistence->setSerial($schema->serial);

        if (null !== $schema->datePublished) {
            if (Carbon::canBeCreatedFromFormat($schema->datePublished, Schema\Timestamp::FormatWithTz)) {
                $persistence->setPublishedAt(
                    Carbon::createFromFormat(Schema\Timestamp::FormatWithTz, $schema->datePublished)->toDateTimeImmutable(),
                );
            }
            if (Carbon::canBeCreatedFromFormat($schema->datePublished, Schema\Timestamp::Format)) {
                $persistence->setPublishedAt(
                    Carbon::createFromFormat(Schema\Timestamp::Format, $schema->datePublished)->toDateTimeImmutable(),
                );
            }
        }
        if (null !== $schema->dateRejected) {
            if (Carbon::canBeCreatedFromFormat($schema->dateRejected, Schema\Timestamp::FormatWithTz)) {
                $persistence->setRejectedAt(
                    Carbon::createFromFormat(Schema\Timestamp::FormatWithTz, $schema->dateRejected)->toDateTimeImmutable(),
                );
            }
            if (Carbon::canBeCreatedFromFormat($schema->dateRejected, Schema\Timestamp::Format)) {
                $persistence->setRejectedAt(
                    Carbon::createFromFormat(Schema\Timestamp::Format, $schema->dateRejected)->toDateTimeImmutable(),
                );
            }
        }
        if (null !== $schema->dateUpdated) {
            if (Carbon::canBeCreatedFromFormat($schema->dateUpdated, Schema\Timestamp::FormatWithTz)) {
                $persistence->setUpdatedAt(
                    Carbon::createFromFormat(Schema\Timestamp::FormatWithTz, $schema->dateUpdated)->toDateTimeImmutable(),
                );
            }
            if (Carbon::canBeCreatedFromFormat($schema->dateUpdated, Schema\Timestamp::Format)) {
                $persistence->setUpdatedAt(
                    Carbon::createFromFormat(Schema\Timestamp::Format, $schema->dateUpdated)->toDateTimeImmutable(),
                );
            }
        }
        if (null !== $schema->dateReserved) {
            if (Carbon::canBeCreatedFromFormat($schema->dateReserved, Schema\Timestamp::FormatWithTz)) {
                $persistence->setReservedAt(
                    Carbon::createFromFormat(Schema\Timestamp::FormatWithTz, $schema->dateReserved)->toDateTimeImmutable(),
                );
            }
            if (Carbon::canBeCreatedFromFormat($schema->dateReserved, Schema\Timestamp::Format)) {
                $persistence->setReservedAt(
                    Carbon::createFromFormat(Schema\Timestamp::Format, $schema->dateReserved)->toDateTimeImmutable(),
                );
            }
        }

        return $persistence;
    }

    public static function mapSchemaToPersistenceAssigner(Schema\RecordMetadata $schema): Persistence\RecordAssigner
    {
        $persistence = new Persistence\RecordAssigner();

        $persistence->setOrgId($schema->assignerOrgId);
        $persistence->setOrgName($schema->assignerShortName);
        $persistence->setUserId($schema->requesterUserId);

        return $persistence;
    }
}
