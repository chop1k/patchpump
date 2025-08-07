<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\Domain\CVE\Schema;

use App\Domain\CVE\Schema\Timeline;
use Carbon\Carbon;

final class TimelineProvider
{
    /**
     * @return Timeline[]
     */
    public static function provideValid(): array
    {
        $timeline_0 = new Timeline();

        $timeline_0->lang = 'fr';
        $timeline_0->value = '123';
        $timeline_0->time = Carbon::now()->format(\DateTimeInterface::ISO8601_EXPANDED);

        return [
            $timeline_0,
        ];
    }

    /**
     * @return Timeline[]
     */
    public static function provideInvalid(): array
    {
        $timeline_0 = new Timeline();

        $timeline_0->lang = null;
        $timeline_0->value = null;
        $timeline_0->time = null;

        $timeline_1 = new Timeline();

        $timeline_1->lang = 'en';
        $timeline_1->value = null;
        $timeline_1->time = null;

        $timeline_2 = new Timeline();

        $timeline_2->lang = null;
        $timeline_2->value = '213';
        $timeline_2->time = null;

        $timeline_3 = new Timeline();

        $timeline_3->lang = null;
        $timeline_3->value = null;
        $timeline_3->time = Carbon::now()->format(\DateTimeInterface::ISO8601_EXPANDED);

        $timeline_4 = new Timeline();

        $timeline_4->lang = 'ok';
        $timeline_4->value = '123';
        $timeline_4->time = Carbon::now()->format(\DateTimeInterface::ISO8601_EXPANDED);

        $timeline_5 = new Timeline();

        $timeline_5->lang = 'us';
        $timeline_5->value = '';
        $timeline_5->time = Carbon::now()->format(\DateTimeInterface::ISO8601_EXPANDED);

        $timeline_6 = new Timeline();

        $timeline_6->lang = 'en-US';
        $timeline_6->value = '123';
        $timeline_6->time = Carbon::now()->format(\DateTimeInterface::ISO8601_EXPANDED);

        $timeline_7 = new Timeline();

        $timeline_7->lang = 'en_GB';
        $timeline_7->value = '123';
        $timeline_7->time = Carbon::now()->format(\DateTimeInterface::ISO8601_EXPANDED);

        $timeline_8 = new Timeline();

        $timeline_8->lang = 'es-419';
        $timeline_8->value = '123';
        $timeline_8->time = Carbon::now()->format(\DateTimeInterface::ISO8601_EXPANDED);

        $timeline_9 = new Timeline();

        $timeline_9->lang = 'uz-Cyrl';
        $timeline_9->value = '123';
        $timeline_9->time = Carbon::now()->format(\DateTimeInterface::ISO8601_EXPANDED);

        return [
            $timeline_0,
            $timeline_1,
            $timeline_2,
            $timeline_3,
            $timeline_4,
            $timeline_5,
            $timeline_6,
            $timeline_7,
            $timeline_8,
            $timeline_9,
        ];
    }
}
