<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\RecordState;
use Carbon\Carbon;
use DateTimeInterface;

final class RecordMetadataMapper
{
    public static function mapSchemaToPersistenceMetadata(?Schema\RecordMetadata $schema): ?Persistence\RecordMetadata
    {
        if (null === $schema) {
            return null;
        }

        $persistence = new Persistence\RecordMetadata();

        if (strtolower($schema->state) === 'published') {
            $persistence->setState(RecordState::Published);
        }

        if (strtolower($schema->state) === 'rejected') {
            $persistence->setState(RecordState::Rejected);
        }

        $persistence->setSerial($schema->serial);

        if ($schema->datePublished !== null) {
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
        if ($schema->dateRejected !== null) {
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
        if ($schema->dateUpdated !== null) {
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
        if ($schema->dateReserved !== null) {
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

    public static function mapSchemaToPersistenceAssigner(?Schema\RecordMetadata $schema): ?Persistence\RecordAssigner
    {
        if (null === $schema) {
            return null;
        }

        $persistence = new Persistence\RecordAssigner();

        $persistence->setOrgId($schema->assignerOrgId);
        $persistence->setOrgName($schema->assignerShortName);
        $persistence->setUserId($schema->requesterUserId);

        return $persistence;
    }
}