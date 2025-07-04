<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use Carbon\Carbon;

final class ProviderMetadataMapper
{
    public static function mapSchemaToPersistence(?Schema\ProviderMetadata $schema): ?Persistence\ContainerProvider
    {
        if (null === $schema) {
            return null;
        }

        $persistence = new Persistence\ContainerProvider();

        $persistence->setOrgId($schema->orgId);
        $persistence->setOrgName($schema->shortName);

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

        return $persistence;
    }

    public static function mapPersistenceToSchema(?Persistence\ContainerProvider $persistence): ?Schema\ProviderMetadata
    {
    }
}