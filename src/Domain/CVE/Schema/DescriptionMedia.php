<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

final class DescriptionMedia
{
    public ?string $type = null;

    public ?bool $isBase64 = null;

    public ?string $value = null;
}