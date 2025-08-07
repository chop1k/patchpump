<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\Domain\CVE\Schema;

use App\Domain\CVE\Schema\AffectedVersion;

final class AffectedVersionProvider
{
    /**
     * @return AffectedVersion[]
     */
    public static function provideValid(): array
    {
        $version_0 = new AffectedVersion();

        $version_0->version = '123';
        $version_0->status = 'affected';

        $version_1 = new AffectedVersion();

        $version_1->version = '123';
        $version_1->status = 'affected';
        $version_1->versionType = '123';

        $version_2 = new AffectedVersion();

        $version_2->version = '123';
        $version_2->status = 'affected';
        $version_2->versionType = '123';
        $version_2->lessThan = '123';

        $version_3 = new AffectedVersion();

        $version_3->version = '123';
        $version_3->status = 'affected';
        $version_3->versionType = '123';
        $version_3->lessThanOrEqual = '123';

        $version_4 = new AffectedVersion();

        $version_4->version = '123';
        $version_4->status = 'affected';
        $version_4->changes = AffectedVersionChangeProvider::provideValid();

        $version_5 = new AffectedVersion();

        $version_5->version = '123';
        $version_5->status = 'affected';
        $version_5->versionType = '123';
        $version_5->changes = AffectedVersionChangeProvider::provideValid();

        $version_6 = new AffectedVersion();

        $version_6->version = '123';
        $version_6->status = 'affected';
        $version_6->versionType = '123';
        $version_6->lessThan = '123';
        $version_6->changes = AffectedVersionChangeProvider::provideValid();

        $version_7 = new AffectedVersion();

        $version_7->version = '123';
        $version_7->status = 'affected';
        $version_7->versionType = '123';
        $version_7->lessThanOrEqual = '123';
        $version_7->changes = AffectedVersionChangeProvider::provideValid();

        return [
            $version_0,
            $version_1,
            $version_2,
            $version_3,
            $version_4,
            $version_5,
            $version_6,
            $version_7,
        ];
    }

    /**
     * @return AffectedVersion[]
     */
    public static function provideInvalid(): array
    {
        $version_0 = new AffectedVersion();

        $version_0->version = null;
        $version_0->status = null;

        $version_1 = new AffectedVersion();

        $version_1->version = '123';
        $version_1->status = null;

        $version_2 = new AffectedVersion();

        $version_2->version = null;
        $version_2->status = 'affected';

        $version_3 = new AffectedVersion();

        $version_3->version = null;
        $version_3->status = '1234';

        $version_4 = new AffectedVersion();

        $version_4->version = '';
        $version_4->status = 'affected';

        $version_5 = new AffectedVersion();

        $version_5->version = '123';
        $version_5->status = '';

        $version_6 = new AffectedVersion();

        $version_6->version = '123';
        $version_6->status = 'affected';
        $version_6->lessThan = '123';

        $version_7 = new AffectedVersion();

        $version_7->version = '123';
        $version_7->status = 'affected';
        $version_7->lessThanOrEqual = '123';

        $version_8 = new AffectedVersion();

        $version_8->version = '123';
        $version_8->status = 'affected';
        $version_8->changes = [];

        $version_9 = new AffectedVersion();

        $version_9->version = '123';
        $version_9->status = 'affected';
        $version_9->changes = [
            null,
        ];

        $version_10 = new AffectedVersion();

        $version_10->version = '123';
        $version_10->status = 'affected';
        $version_10->changes = [
            '123',
        ];

        $version_11 = new AffectedVersion();

        $version_11->version = '123';
        $version_11->status = 'affected';
        $version_11->changes = AffectedVersionChangeProvider::provideInvalid();

        $version_12 = new AffectedVersion();

        $version_12->version = '123';
        $version_12->status = 'affected';
        $version_12->changes = [
            null,
            ...AffectedVersionChangeProvider::provideValid(),
            null,
        ];

        return [
            $version_0,
            $version_1,
            $version_2,
            $version_3,
            $version_4,
            $version_5,
            $version_6,
            $version_7,
            $version_8,
            $version_9,
            $version_10,
            $version_11,
            $version_12,
        ];
    }
}
