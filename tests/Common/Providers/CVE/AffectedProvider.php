<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\CVE;

use App\Domain\CVE\Schema\Affected;

final class AffectedProvider
{
    /**
     * @return Affected[]
     */
    public static function provideValid(): array
    {
        $affected_0 = new Affected();

        $affected_0->vendor = '124';
        $affected_0->product = '123';
        $affected_0->defaultStatus = 'affected';

        $affected_1 = new Affected();

        $affected_1->vendor = '124';
        $affected_1->product = '123';
        $affected_1->versions = AffectedVersionProvider::provideValid();

        $affected_2 = new Affected();

        $affected_2->collectionURL = '123';
        $affected_2->packageName = '124';
        $affected_2->defaultStatus = 'affected';

        $affected_3 = new Affected();

        $affected_3->vendor = '124';
        $affected_3->product = '123';
        $affected_3->defaultStatus = 'affected';
        $affected_3->cpes = [
            'cpe:2.3:o:microsoft:windows_7:-:sp2:*:*:*:*:*:*'
        ];

        return [
            $affected_0,
            $affected_1,
            $affected_2,
            $affected_3,
        ];
    }

    /**
     * @return Affected[]
     */
    public static function provideInvalid(): array
    {
        $affected_0 = new Affected();

        $affected_0->vendor = null;
        $affected_0->product = null;
        $affected_0->defaultStatus = null;

        $affected_1 = new Affected();

        $affected_1->vendor = '123';
        $affected_1->product = null;
        $affected_1->defaultStatus = null;

        $affected_2 = new Affected();

        $affected_2->vendor = '123';
        $affected_2->product = '123';
        $affected_2->defaultStatus = null;

        $affected_3 = new Affected();

        $affected_3->vendor = '123';
        $affected_3->product = '123';
        $affected_3->defaultStatus = '123';

        $affected_4 = new Affected();

        $affected_4->vendor = '';
        $affected_4->product = '123';
        $affected_4->defaultStatus = 'affected';

        $affected_5 = new Affected();

        $affected_5->vendor = '124';
        $affected_5->product = '';
        $affected_5->defaultStatus = 'affected';

        $affected_6 = new Affected();

        $affected_6->vendor = '124';
        $affected_6->product = '123';
        $affected_6->defaultStatus = '';

        $affected_7 = new Affected();

        $affected_7->collectionURL = '';
        $affected_7->product = '123';
        $affected_7->defaultStatus = 'affected';

        $affected_8 = new Affected();

        $affected_8->collectionURL = '123';
        $affected_8->packageName = '';
        $affected_8->defaultStatus = 'affected';

        $affected_9 = new Affected();

        $affected_9->collectionURL = '';
        $affected_9->packageName = '';
        $affected_9->defaultStatus = 'affected';

        $affected_10 = new Affected();

        $affected_10->collectionURL = null;
        $affected_10->packageName = '123';
        $affected_10->defaultStatus = 'affected';

        $affected_11 = new Affected();

        $affected_11->collectionURL = '123';
        $affected_11->packageName = null;
        $affected_11->defaultStatus = 'affected';

        $affected_12 = new Affected();

        $affected_12->collectionURL = '';
        $affected_12->packageName = '123';
        $affected_12->defaultStatus = 'affected';

//        $affected_13 = new Affected();
//
//        $affected_13->vendor = '124';
//        $affected_13->product = '123';
//        $affected_13->defaultStatus = 'affected';
//        $affected_13->cpes = [
//            '123',
//        ];

        $affected_14 = new Affected();

        $affected_14->vendor = '124';
        $affected_14->product = '123';
        $affected_14->defaultStatus = 'affected';
        $affected_14->cpes = [
            null,
        ];

        $affected_15 = new Affected();

        $affected_15->vendor = '124';
        $affected_15->product = '123';
        $affected_15->defaultStatus = 'affected';
        $affected_15->cpes = [
            null,
            '123',
        ];

        $affected_16 = new Affected();

        $affected_16->vendor = '124';
        $affected_16->product = '123';
        $affected_16->defaultStatus = 'affected';
        $affected_16->cpes = [
            true,
        ];

        $affected_17 = new Affected();

        $affected_17->vendor = '124';
        $affected_17->product = '123';
        $affected_17->defaultStatus = 'affected';
        $affected_17->modules = [
            true,
        ];

        $affected_18 = new Affected();

        $affected_18->vendor = '124';
        $affected_18->product = '123';
        $affected_18->defaultStatus = 'affected';
        $affected_18->modules = [
            null,
        ];

        $affected_19 = new Affected();

        $affected_19->vendor = '124';
        $affected_19->product = '123';
        $affected_19->defaultStatus = 'affected';
        $affected_19->modules = [
            null,
            '123',
        ];

        $affected_20 = new Affected();

        $affected_20->vendor = '124';
        $affected_20->product = '123';
        $affected_20->defaultStatus = 'affected';
        $affected_20->programFiles = [
            true,
        ];

        $affected_21 = new Affected();

        $affected_21->vendor = '124';
        $affected_21->product = '123';
        $affected_21->defaultStatus = 'affected';
        $affected_21->programFiles = [
            null,
        ];

        $affected_22 = new Affected();

        $affected_22->vendor = '124';
        $affected_22->product = '123';
        $affected_22->defaultStatus = 'affected';
        $affected_22->programFiles = [
            null,
            '123',
        ];

        $affected_23 = new Affected();

        $affected_23->vendor = '124';
        $affected_23->product = '123';
        $affected_23->defaultStatus = 'affected';
        $affected_23->programRoutines = [
            null,
        ];

        $affected_24 = new Affected();

        $affected_24->vendor = '124';
        $affected_24->product = '123';
        $affected_24->defaultStatus = 'affected';
        $affected_24->programRoutines = [
            '1233',
        ];

        $affected_25 = new Affected();

        $affected_25->vendor = '124';
        $affected_25->product = '123';
        $affected_25->defaultStatus = 'affected';
        $affected_25->programRoutines = [
            null,
            ...AffectedRoutineProvider::provideValid(),
        ];

        $affected_26 = new Affected();

        $affected_26->vendor = '124';
        $affected_26->product = '123';
        $affected_26->defaultStatus = 'affected';
        $affected_26->programRoutines = AffectedRoutineProvider::provideInvalid();

        $affected_27 = new Affected();

        $affected_27->vendor = '124';
        $affected_27->product = '123';
        $affected_27->defaultStatus = 'affected';
        $affected_27->platforms = [];

        $affected_28 = new Affected();

        $affected_28->vendor = '124';
        $affected_28->product = '123';
        $affected_28->defaultStatus = 'affected';
        $affected_28->platforms = [
            null,
        ];

        $affected_29 = new Affected();

        $affected_29->vendor = '124';
        $affected_29->product = '123';
        $affected_29->defaultStatus = 'affected';
        $affected_29->platforms = [
            true,
        ];

        $affected_30 = new Affected();

        $affected_30->vendor = '124';
        $affected_30->product = '123';
        $affected_30->defaultStatus = 'affected';
        $affected_30->repo = '';

        $affected_31 = new Affected();

        $affected_31->vendor = '124';
        $affected_31->product = '123';
        $affected_31->defaultStatus = 'affected';
        $affected_31->versions = [];

        $affected_32 = new Affected();

        $affected_32->vendor = '124';
        $affected_32->product = '123';
        $affected_32->defaultStatus = 'affected';
        $affected_32->versions = [
            null,
        ];

        $affected_33 = new Affected();

        $affected_33->vendor = '124';
        $affected_33->product = '123';
        $affected_33->defaultStatus = 'affected';
        $affected_33->versions = [
            null,
            ...AffectedVersionProvider::provideValid(),
        ];

        $affected_34 = new Affected();

        $affected_34->vendor = '124';
        $affected_34->product = '123';
        $affected_34->defaultStatus = 'affected';
        $affected_34->versions = AffectedVersionProvider::provideInvalid();

        $affected_35 = new Affected();

        $affected_35->vendor = '124';
        $affected_35->product = '123';
        $affected_35->defaultStatus = 'affected';
        $affected_35->versions = [
            true,
        ];

        return [
            $affected_0,
            $affected_1,
            $affected_2,
            $affected_3,
            $affected_4,
            $affected_5,
            $affected_6,
            $affected_7,
            $affected_8,
            $affected_9,
            $affected_10,
            $affected_11,
            $affected_12,
//            $affected_13,
            $affected_14,
            $affected_15,
            $affected_16,
            $affected_17,
            $affected_18,
            $affected_19,
            $affected_20,
            $affected_21,
            $affected_22,
            $affected_23,
            $affected_24,
            $affected_25,
            $affected_26,
            $affected_27,
            $affected_28,
            $affected_29,
            $affected_30,
            $affected_31,
            $affected_32,
            $affected_33,
            $affected_34,
            $affected_35,
        ];
    }
}