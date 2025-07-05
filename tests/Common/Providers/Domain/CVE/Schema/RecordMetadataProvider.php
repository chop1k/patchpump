<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\Domain\CVE\Schema;

use App\Domain\CVE\Schema\RecordMetadata;
use Carbon\Carbon;
use DateTimeInterface;

final class RecordMetadataProvider
{
    /**
     * @return RecordMetadata[]
     */
    public static function provideValid(): array
    {
        $metadata_0 = new RecordMetadata();

        $metadata_0->cveId = 'CVE-04-12';
        $metadata_0->state = 'PUBLISHED';
        $metadata_0->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';

        $metadata_1 = new RecordMetadata();

        $metadata_1->cveId = 'CVE-04-12';
        $metadata_1->state = 'PUBLISHED';
        $metadata_1->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_1->assignerShortName = '123';

        $metadata_2 = new RecordMetadata();

        $metadata_2->cveId = 'CVE-04-12';
        $metadata_2->state = 'PUBLISHED';
        $metadata_2->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_2->requesterUserId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';

        $metadata_3 = new RecordMetadata();

        $metadata_3->cveId = 'CVE-04-12';
        $metadata_3->state = 'PUBLISHED';
        $metadata_3->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_3->serial = 3;

        $metadata_4 = new RecordMetadata();

        $metadata_4->cveId = 'CVE-04-12';
        $metadata_4->state = 'PUBLISHED';
        $metadata_4->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_4->dateUpdated = '2025-03-19T18:41:32.004Z';

        $metadata_5 = new RecordMetadata();

        $metadata_5->cveId = 'CVE-04-12';
        $metadata_5->state = 'PUBLISHED';
        $metadata_5->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_5->dateUpdated = '2008-10-14T00:00:00';

        $metadata_6 = new RecordMetadata();

        $metadata_6->cveId = 'CVE-04-12';
        $metadata_6->state = 'PUBLISHED';
        $metadata_6->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_6->datePublished = '2025-03-19T18:41:32.004Z';

        $metadata_7 = new RecordMetadata();

        $metadata_7->cveId = 'CVE-04-12';
        $metadata_7->state = 'PUBLISHED';
        $metadata_7->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_7->datePublished = '2008-10-14T00:00:00';

        $metadata_8 = new RecordMetadata();

        $metadata_8->cveId = 'CVE-04-12';
        $metadata_8->state = 'PUBLISHED';
        $metadata_8->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_8->dateReserved = '2025-03-19T18:41:32.004Z';

        $metadata_9 = new RecordMetadata();

        $metadata_9->cveId = 'CVE-04-12';
        $metadata_9->state = 'PUBLISHED';
        $metadata_9->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_9->dateReserved = '2008-10-14T00:00:00';

        $metadata_10 = new RecordMetadata();

        $metadata_10->cveId = 'CVE-04-12';
        $metadata_10->state = 'REJECTED';
        $metadata_10->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_10->dateRejected = '2025-03-19T18:41:32.004Z';

        $metadata_11 = new RecordMetadata();

        $metadata_11->cveId = 'CVE-04-12';
        $metadata_11->state = 'REJECTED';
        $metadata_11->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_11->dateRejected = '2008-10-14T00:00:00';

        return [
            $metadata_0,
            $metadata_1,
            $metadata_2,
            $metadata_3,
            $metadata_4,
            $metadata_5,
            $metadata_6,
            $metadata_7,
            $metadata_8,
            $metadata_9,
            $metadata_10,
            $metadata_11,
        ];
    }

    /**
     * @return RecordMetadata[]
     */
    public static function provideInvalid(): array
    {
        $metadata_0 = new RecordMetadata();

        $metadata_0->cveId = null;
        $metadata_0->state = 'PUBLISHED';
        $metadata_0->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';

        $metadata_1 = new RecordMetadata();

        $metadata_1->cveId = 'CVE-4-123';
        $metadata_1->state = '123';
        $metadata_1->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';

        $metadata_2 = new RecordMetadata();

        $metadata_2->cveId = 'CVE-4-123';
        $metadata_2->state = '';
        $metadata_2->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';

        $metadata_3 = new RecordMetadata();

        $metadata_3->cveId = 'CVE-4-123';
        $metadata_3->state = 'PUBLISHED';
        $metadata_3->assignerOrgId = '123';

        $metadata_4 = new RecordMetadata();

        $metadata_4->cveId = 'CVE-4-123';
        $metadata_4->state = null;
        $metadata_4->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';

        $metadata_5 = new RecordMetadata();

        $metadata_5->cveId = 'CVE-4-123';
        $metadata_5->state = 'PUBLISHED';
        $metadata_5->assignerOrgId = null;

        $metadata_6 = new RecordMetadata();

        $metadata_6->cveId = 'CVE-04-12';
        $metadata_6->state = 'PUBLISHED';
        $metadata_6->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_6->assignerShortName = '';

        $metadata_7 = new RecordMetadata();

        $metadata_7->cveId = 'CVE-04-12';
        $metadata_7->state = 'PUBLISHED';
        $metadata_7->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_7->assignerShortName = '1';

        $metadata_8 = new RecordMetadata();

        $metadata_8->cveId = 'CVE-04-12';
        $metadata_8->state = 'PUBLISHED';
        $metadata_8->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_8->requesterUserId = '123';

        $metadata_9 = new RecordMetadata();

        $metadata_9->cveId = 'CVE-04-12';
        $metadata_9->state = 'PUBLISHED';
        $metadata_9->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_9->serial = 0;

        $metadata_10 = new RecordMetadata();

        $metadata_10->cveId = 'CVE-04-12';
        $metadata_10->state = 'PUBLISHED';
        $metadata_10->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_10->serial = -1;

        $metadata_11 = new RecordMetadata();

        $metadata_11->cveId = 'CVE-04-12';
        $metadata_11->state = 'PUBLISHED';
        $metadata_11->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_11->dateReserved = '123';

        $metadata_12 = new RecordMetadata();

        $metadata_12->cveId = 'CVE-04-12';
        $metadata_12->state = 'PUBLISHED';
        $metadata_12->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_12->datePublished = '123';

        $metadata_13 = new RecordMetadata();

        $metadata_13->cveId = 'CVE-04-12';
        $metadata_13->state = 'PUBLISHED';
        $metadata_13->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_13->dateUpdated = '123';

        $metadata_14 = new RecordMetadata();

        $metadata_14->cveId = 'CVE-04-12';
        $metadata_14->state = 'REJECTED';
        $metadata_14->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_14->dateRejected = '123';

        $metadata_15 = new RecordMetadata();

        $metadata_15->cveId = 'CVE-04-12';
        $metadata_15->state = 'PUBLISHED';
        $metadata_15->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';
        $metadata_15->dateRejected = Carbon::now()->format(DateTimeInterface::ISO8601_EXPANDED);

        return [
            $metadata_0,
            $metadata_1,
            $metadata_2,
            $metadata_3,
            $metadata_4,
            $metadata_5,
            $metadata_6,
            $metadata_7,
            $metadata_8,
            $metadata_9,
            $metadata_10,
            $metadata_11,
            $metadata_12,
            $metadata_13,
            $metadata_14,
            $metadata_15,
        ];
    }
}