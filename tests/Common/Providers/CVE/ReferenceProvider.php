<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\CVE;

use App\Domain\CVE\Schema\Reference;

final class ReferenceProvider
{
    /**
     * @return Reference[]
     */
    public static function provideValid(): array
    {
        $reference_0 = new Reference();

        $reference_0->url = '123';

        $reference_1 = new Reference();

        $reference_1->url = '123';
        $reference_1->name = '123';

        $reference_2 = new Reference();

        $reference_2->url = '123';
        $reference_2->tags = [
            'disputed'
        ];

        $reference_3 = new Reference();

        $reference_3->url = '123';
        $reference_3->tags = [
            'x_alalala'
        ];

        return [
            $reference_0,
            $reference_1,
            $reference_2,
            $reference_3,
        ];
    }

    /**
     * @return Reference[]
     */
    public static function provideInvalid(): array
    {
        $reference_0 = new Reference();

        $reference_0->url = null;

        $reference_1 = new Reference();

        $reference_1->url = '123';
        $reference_1->name = '';

        $reference_2 = new Reference();

        $reference_2->url = '123';
        $reference_2->tags = [];

//        $reference_3 = new Reference();
//
//        $reference_3->url = '123';
//        $reference_3->tags = [
//            '123',
//        ];

        $reference_4 = new Reference();

        $reference_4->url = '123';
        $reference_4->tags = [
            null,
        ];

//        $reference_5 = new Reference();
//
//        $reference_5->url = '123';
//        $reference_5->tags = [
//            '',
//        ];

//        $reference_6 = new Reference();
//
//        $reference_6->url = '123';
//        $reference_6->tags = [
//            'disputed',
//            '123'
//        ];

        $reference_7 = new Reference();

        $reference_7->url = '123';
        $reference_7->tags = [
            'disputed',
            null
        ];

        $reference_8 = new Reference();

        $reference_8->url = '123';
        $reference_8->tags = [
            'disputed',
            ''
        ];

        return [
            $reference_0,
            $reference_1,
            $reference_2,
//            $reference_3,
            $reference_4,
//            $reference_5,
//            $reference_6,
            $reference_7,
            $reference_8,
        ];
    }
}