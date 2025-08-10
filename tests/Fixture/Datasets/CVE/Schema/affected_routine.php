<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\AffectedRoutine;

if (false === function_exists('provide_valid_affected_routines')) {
    /**
     * @return AffectedRoutine[]
     */
    function provide_valid_affected_routines(): array
    {
        $routine_0 = new AffectedRoutine();

        $routine_0->name = '123';

        return [
            $routine_0,
        ];
    }
}

if (false === function_exists('provide_invalid_affected_routines')) {
    /**
     * @return AffectedRoutine[]
     */
    function provide_invalid_affected_routines(): array
    {
        $routine_0 = new AffectedRoutine();

        $routine_0->name = null;

        $routine_1 = new AffectedRoutine();

        $routine_1->name = '';

        return [
            $routine_0,
            $routine_1,
        ];
    }
}
