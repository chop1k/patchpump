<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\DescriptionMedia;

if (false === function_exists('provide_valid_description_media')) {
    /**
     * @return DescriptionMedia[]
     */
    function provide_valid_description_media(): array
    {
        $media_0 = new DescriptionMedia();

        $media_0->type = 'text/html';
        $media_0->value = '123';
        $media_0->base64 = false;

        $media_1 = new DescriptionMedia();

        $media_1->type = 'text/html';
        $media_1->value = '123';
        $media_1->base64 = true;

        return [
            $media_0,
            $media_1,
        ];
    }
}

if (false === function_exists('provide_invalid_description_media')) {
    /**
     * @return DescriptionMedia[]
     */
    function provide_invalid_description_media(): array
    {
        $media_0 = new DescriptionMedia();

        $media_0->type = null;
        $media_0->value = '123';
        $media_0->base64 = false;

        $media_1 = new DescriptionMedia();

        $media_1->type = 'text/html';
        $media_1->value = null;
        $media_1->base64 = false;

        $media_2 = new DescriptionMedia();

        $media_2->type = 'text/html';
        $media_2->value = '';
        $media_2->base64 = false;

        $media_3 = new DescriptionMedia();

        $media_3->type = '';
        $media_3->value = '123';
        $media_3->base64 = false;

        return [
            $media_0,
            $media_1,
            $media_2,
            $media_3,
        ];
    }
}
