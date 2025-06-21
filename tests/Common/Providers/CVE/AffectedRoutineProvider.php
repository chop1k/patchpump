<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\CVE;

use App\Domain\CVE\Schema\AffectedRoutine;

final class AffectedRoutineProvider
{
    public static function provideValid(): array
    {
        $routine_0 = new AffectedRoutine();

        $routine_0->name = '123';

        return [
            $routine_0,
        ];
    }

    public static function provideInvalid(): array
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