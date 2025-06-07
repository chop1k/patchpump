<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

final class CNAPublished
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 255)]
    public ?string $title = null;

    #[Assert\NotNull]
    public ?ProviderMetadata $providerMetadata = null;

    public ?Source $source = null;

    /**
     * @var Description[]|null
     */
    #[Assert\NotNull]
    #[Assert\Length(min: 1)]
    #[Assert\Unique]
    public ?array $descriptions = null;

    /**
     * @var Affected[]|null
     */
    #[Assert\NotNull]
    #[Assert\Length(min: 1)]
    public ?array $affected = null;

    public ?array $applicability = null;

    public ?array $problems = null;

    /**
     * @var Reference[]|null
     */
    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 512)]
    #[Assert\Unique]
    public ?array $references = null;

    /**
     * @var Impact[]|null
     */
    #[Assert\Length(min: 1)]
    #[Assert\Unique]
    public ?array $impacts = null;

    public ?array $metrics = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Length(min: 1)]
    #[Assert\Unique]
    public ?array $configurations = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Length(min: 1)]
    #[Assert\Unique]
    public ?array $workarounds = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Length(min: 1)]
    #[Assert\Unique]
    public ?array $solutions = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Length(min: 1)]
    #[Assert\Unique]
    public ?array $exploits = null;

    /**
     * @var Timeline[]|null
     */
    public ?array $timelines = null;

    /**
     * @var Credit[]|null
     */
    #[Assert\Length(min: 1)]
    #[Assert\Unique]
    public ?array $credits = null;

    public ?array $tags = null;

    public ?\DateTimeImmutable $publicAt = null;

    public ?\DateTimeImmutable $assignedAt = null;
}