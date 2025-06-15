<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

final class ProviderMetadata
{
    #[Assert\NotNull]
    #[Assert\Uuid]
    public ?string $orgId = null;

    #[Assert\Length(min: 2, max: 32)]
    public ?string $shortName = null;

    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?\DateTimeImmutable $dateUpdated = null;
}