<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\AffectedVersionChange;

if (false === function_exists('provide_valid_affected_version_changes')) {
    /**
     * @return AffectedVersionChange[]
     */
    function provide_valid_affected_version_changes(): array
    {
        $change_0 = new AffectedVersionChange();

        $change_0->at = '123';
        $change_0->status = 'affected';

        return [
            $change_0,
        ];
    }
}

if (false === function_exists('provide_invalid_affected_version_changes')) {
    /**
     * @return AffectedVersionChange[]
     */
    function provide_invalid_affected_version_changes(): array
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
