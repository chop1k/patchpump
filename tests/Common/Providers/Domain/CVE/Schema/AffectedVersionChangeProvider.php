<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\Domain\CVE\Schema;

use App\Domain\CVE\Schema\AffectedVersionChange;

final class AffectedVersionChangeProvider
{
    /**
     * @return AffectedVersionChange[]
     */
    public static function provideValid(): array
    {
        $change_0 = new AffectedVersionChange();

        $change_0->at = '123';
        $change_0->status = 'affected';

        return [
            $change_0,
        ];
    }

    /**
     * @return AffectedVersionChange[]
     */
    public static function provideInvalid(): array
    {
        $change_0 = new AffectedVersionChange();

        $change_0->at = null;
        $change_0->status = 'affected';

        $change_1 = new AffectedVersionChange();

        $change_1->at = '123';
        $change_1->status = null;

        $change_2 = new AffectedVersionChange();

        $change_2->at = null;
        $change_2->status = null;

        $change_3 = new AffectedVersionChange();

        $change_3->at = '123';
        $change_3->status = '123';

        $change_4 = new AffectedVersionChange();

        $change_4->at = '';
        $change_4->status = 'affected';

        $change_5 = new AffectedVersionChange();

        $change_5->at = '123';
        $change_5->status = '';

        return [
            $change_0,
            $change_1,
            $change_2,
            $change_3,
            $change_4,
            $change_5,
        ];
    }
}
