<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Common;

use App\Domain\CVE\Schema;
use Carbon\Carbon;

final readonly class Timestamp
{
    public function __construct(
        private string $timestamp,
    ) {
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function toDateTimeImmutable(): \DateTimeImmutable
    {
        if (Carbon::canBeCreatedFromFormat($this->timestamp, Schema\Timestamp::FormatWithTz)) {
            return Carbon::createFromFormat(Schema\Timestamp::FormatWithTz, $this->timestamp)
                ->toDateTimeImmutable();
        }

        if (Carbon::canBeCreatedFromFormat($this->timestamp, Schema\Timestamp::Format)) {
            return Carbon::createFromFormat(Schema\Timestamp::Format, $this->timestamp)->toDateTimeImmutable();
        }

        throw new \InvalidArgumentException('Unsupported timestamp format');
    }
}
