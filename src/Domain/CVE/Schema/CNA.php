<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

#[Assert\Cascade]
final class CNA
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 256)]
    public ?string $title = null;

    #[Assert\NotNull]
    public ?ProviderMetadata $providerMetadata = null;

    #[Assert\Length(min: 1)]
    public ?array $source = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Length(min: 1)]
    #[Assert\Unique]
    public ?array $descriptions = null;

    /**
     * @var Affected[]|null
     */
    #[Assert\Length(min: 1)]
    public ?array $affected = null;

    /**
     * @var CPEApplicability[]|null
     */
    public ?array $applicability = null;

    /**
     * @var ProblemType[]|null
     */
    #[Assert\Length(min: 1)]
    #[Assert\Unique]
    public ?array $problems = null;

    /**
     * @var Reference[]|null
     */
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

    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?\DateTimeImmutable $dateAssigned = null;

    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?\DateTimeImmutable $datePublished = null;

    /**
     * @var Description[]|null
     */
    public ?array $rejectedReasons = null;

    /**
     * @var string[]|null
     */
    #[Assert\Length(min: 1)]
    #[Assert\Unique]
    #[Assert\All(
        constraints: [
            new Assert\Type('string'),
            new Assert\Regex('^CVE-[0-9]{4}-[0-9]{4,19}$'),
        ]
    )]
    public ?array $replacedBy = null;
}