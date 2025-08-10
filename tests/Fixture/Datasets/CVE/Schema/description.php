<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\Description;

if (false === function_exists('provide_valid_descriptions')) {
    /**
     * @return Description[]
     */
    function provide_valid_descriptions(): array
    {
        $description_0 = new Description();

        $description_0->lang = 'en';
        $description_0->value = 'This is a description';
        $description_0->supportingMedia = null;

        $description_1 = new Description();

        $description_1->lang = 'en';
        $description_1->value = 'This is a description';
        $description_1->supportingMedia = provide_valid_description_media();

        return [
            $description_0,
            $description_1,
        ];
    }
}

if (false === function_exists('provide_invalid_descriptions')) {
    /**
     * @return Description[]
     */
    function provide_invalid_descriptions(): array
    {
        $description_0 = new Description();

        $description_0->lang = null;
        $description_0->value = 'This is a description';
        $description_0->supportingMedia = provide_valid_description_media();

        $description_1 = new Description();

        $description_1->lang = null;
        $description_1->value = null;
        $description_1->supportingMedia = provide_valid_description_media();

        $description_2 = new Description();

        $description_2->lang = 'en';
        $description_2->value = null;
        $description_2->supportingMedia = provide_valid_description_media();

        $description_3 = new Description();

        $description_3->lang = 'en';
        $description_3->value = '';
        $description_3->supportingMedia = provide_valid_description_media();

        $description_4 = new Description();

        $description_4->lang = 'en';
        $description_4->value = 'This is a description';
        $description_4->supportingMedia = provide_invalid_description_media();

        $description_5 = new Description();

        $description_5->lang = 'en';
        $description_5->value = 'This is a description';
        $description_5->supportingMedia = [
            null,
        ];

        $description_6 = new Description();

        $description_6->lang = 'en';
        $description_6->value = 'This is a description';
        $description_6->supportingMedia = [
            '123',
        ];

        $description_7 = new Description();

        $description_7->lang = 'en';
        $description_7->value = 'This is a description';
        $description_7->supportingMedia = [];

        $description_8 = new Description();

        $description_8->lang = 'en';
        $description_8->value = 'This is a description';
        $description_8->supportingMedia = [
            '123',
            '123',
        ];

        return [
            $description_0,
            $description_1,
            $description_2,
            $description_3,
            $description_4,
            $description_5,
            $description_6,
            $description_7,
            $description_8,
        ];
    }
}
