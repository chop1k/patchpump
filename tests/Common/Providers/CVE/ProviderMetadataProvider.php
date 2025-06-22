<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\CVE;

use App\Domain\CVE\Schema\ProviderMetadata;
use Carbon\Carbon;
use DateTimeInterface;

final class ProviderMetadataProvider
{
    public static function provideValid(): array
    {
        $metadata_0 = new ProviderMetadata();

        $metadata_0->orgId = '9162aa6e-691a-47b8-8d1b-833f199741d2';

        $metadata_1 = new ProviderMetadata();

        $metadata_1->orgId = '9162aa6e-691a-47b8-8d1b-833f199741d2';
        $metadata_1->shortName = '123';

        $metadata_2 = new ProviderMetadata();

        $metadata_2->orgId = '9162aa6e-691a-47b8-8d1b-833f199741d2';
        $metadata_2->dateUpdated = Carbon::now()->format(DateTimeInterface::ISO8601_EXPANDED);

        return [
            $metadata_0,
            $metadata_1,
            $metadata_2,
        ];
    }

    public static function provideInvalid(): array
    {
        $metadata_0 = new ProviderMetadata();

        $metadata_0->orgId = null;

        $metadata_1 = new ProviderMetadata();

        $metadata_1->orgId = '123';

        $metadata_2 = new ProviderMetadata();

        $metadata_2->orgId = '9162aa6e-691a-47b8-8d1b-833f199741d2';
        $metadata_2->shortName = '1';

        $metadata_3 = new ProviderMetadata();

        $metadata_3->orgId = '9162aa6e-691a-47b8-8d1b-833f199741d2';
        $metadata_3->shortName = '';

        $metadata_4 = new ProviderMetadata();

        $metadata_4->orgId = '9162aa6e-691a-47b8-8d1b-833f199741d2';
        $metadata_4->dateUpdated = '123';

        return [
            $metadata_0,
            $metadata_1,
            $metadata_2,
            $metadata_3,
            $metadata_4,
        ];
    }
}