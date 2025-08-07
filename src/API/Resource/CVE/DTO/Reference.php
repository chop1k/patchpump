<?php

declare(strict_types=1);

namespace App\API\Resource\CVE\DTO;

final class Reference
{
    private ?string $description = null;

    public function __construct(
        private readonly string $url,
    ) {
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
