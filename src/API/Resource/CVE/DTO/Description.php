<?php

declare(strict_types=1);

namespace App\API\Resource\CVE\DTO;

final readonly class Description
{
    public ?string $language;

    public ?string $value;

    public function __construct()
    {
        $this->language = null;
        $this->value = null;
    }
}
