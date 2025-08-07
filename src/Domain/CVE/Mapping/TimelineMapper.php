<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Carbon\Carbon;

final class TimelineMapper
{
    public static function mapSchemaToPersistence(Schema\Timeline $schema): Persistence\Timeline
    {
        $persistence = new Persistence\Timeline();

        $persistence->setLanguage($schema->lang);
        $persistence->setContent($schema->value);

        if (Carbon::canBeCreatedFromFormat($schema->time, Schema\Timestamp::FormatWithTz)) {
            $persistence->setTimestamp(
                Carbon::createFromFormat(Schema\Timestamp::FormatWithTz, $schema->time)->toDateTimeImmutable(),
            );
        } elseif (Carbon::canBeCreatedFromFormat($schema->time, Schema\Timestamp::Format)) {
            $persistence->setTimestamp(
                Carbon::createFromFormat(Schema\Timestamp::Format, $schema->time)->toDateTimeImmutable(),
            );
        }

        return $persistence;
    }
}
