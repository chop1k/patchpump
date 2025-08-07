<?php

declare(strict_types=1);

namespace App\API\Resource\CVE\DTO;

final class Vendor
{
    private ?string $name = null;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
