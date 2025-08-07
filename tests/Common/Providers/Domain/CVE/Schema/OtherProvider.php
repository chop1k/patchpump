<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\Domain\CVE\Schema;

use App\Domain\CVE\Schema\Other;

final class OtherProvider
{
    /**
     * @return Other[]
     */
    public static function provideValid(): array
    {
        $other_0 = new Other();

        $other_0->type = '123';
        $other_0->content = [
            'a' => 'a',
        ];

        return [
            $other_0,
        ];
    }

    /**
     * @return Other[]
     */
    public static function provideInvalid(): array
    {
        $other_0 = new Other();

        $other_0->type = null;
        $other_0->content = [
            'a' => 'a',
        ];

        $other_1 = new Other();

        $other_1->type = 'a';
        $other_1->content = [];

        $other_2 = new Other();

        $other_2->type = '';
        $other_2->content = [
            'a' => 'a',
        ];

        $other_4 = new Other();

        $other_4->type = 'a';
        $other_4->content = null;

        return [
            $other_0,
            $other_1,
            $other_2,
            $other_4,
        ];
    }
}
