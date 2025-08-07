<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\Domain\CVE\Schema;

use App\Domain\CVE\Schema\Credit;

final class CreditProvider
{
    /**
     * @return Credit[]
     */
    public static function provideValid(): array
    {
        $credit_0 = new Credit();

        $credit_0->value = '123';
        $credit_0->lang = 'en';

        $credit_1 = new Credit();

        $credit_1->value = '123';
        $credit_1->lang = 'en';
        $credit_1->type = 'finder';

        $credit_2 = new Credit();

        $credit_2->value = '123';
        $credit_2->lang = 'en';
        $credit_2->user = '320a2fa3-b3d6-494d-977c-0c5195bbcdea';

        return [
            $credit_0,
            $credit_1,
            $credit_2,
        ];
    }

    /**
     * @return Credit[]
     */
    public static function provideInvalid(): array
    {
        $credit_0 = new Credit();

        $credit_0->value = '123';
        $credit_0->lang = null;

        $credit_1 = new Credit();

        $credit_1->value = null;
        $credit_1->lang = 'en';

        $credit_2 = new Credit();

        $credit_2->value = null;
        $credit_2->lang = null;

        $credit_3 = new Credit();

        $credit_3->value = '123';
        $credit_3->lang = 'en';
        $credit_3->type = 'c';

        $credit_4 = new Credit();

        $credit_4->value = '123';
        $credit_4->lang = 'en';
        $credit_4->type = '';

        $credit_5 = new Credit();

        $credit_5->value = '123';
        $credit_5->lang = 'en';
        $credit_5->user = '123';

        $credit_6 = new Credit();

        $credit_6->value = '';
        $credit_6->lang = 'en';

        return [
            $credit_0,
            $credit_1,
            $credit_2,
            $credit_3,
            $credit_4,
            $credit_5,
            $credit_6,
        ];
    }
}
