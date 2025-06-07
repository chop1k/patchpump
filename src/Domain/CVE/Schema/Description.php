<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

final class Description
{
    public ?string $language = null;

    public ?string $value = null;

    /**
     * @var DescriptionMedia[]|null
     */
    public ?array $media = null;
}
