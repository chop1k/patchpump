<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

final class RecordMetadata
{
    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[Assert\Regex('^CVE-[0-9]{4}-[0-9]{4,19}$')]
    public ?string $cveId = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[Assert\Uuid]
    public ?string $assignerOrgId = null;

    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 32)]
    public ?string $assignerShortName = null;

    #[Assert\NotBlank]
    #[Assert\Uuid]
    public ?string $requesterUserId = null;

    #[Assert\GreaterThanOrEqual(1)]
    public ?int $serial = null;

    #[Assert\NotBlank]
    #[Assert\When(
        expression: 'state === "PUBLISHED"'
    )]
    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?string $datePublished = null;

    #[Assert\NotBlank]
    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?string $dateReserved = null;

    #[Assert\NotBlank]
    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?string $dateUpdated = null;

    #[Assert\NotBlank]
    #[Assert\When(
        expression: 'state === "REJECTED"'
    )]
    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?string $dateRejected = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[Assert\Choice(choices: ['PUBLISHED', 'REJECTED'])]
    public ?string $state = null;
}