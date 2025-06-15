<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents object for both published/rejected CNA according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see Record
 */
#[Assert\Cascade]
final class CNA
{
    #[Assert\NotNull]
    public ?ProviderMetadata $providerMetadata = null;

    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 256)]
    public ?string $title = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $descriptions = null;

    /**
     * @var Affected[]|null
     */
    #[Assert\Count(min: 1)]
    public ?array $affected = null;

    /**
     * @var CPEApplicability[]|null
     */
    public ?array $applicability = null;

    /**
     * @var ProblemType[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $problems = null;

    /**
     * @var Reference[]|null
     */
    #[Assert\Count(min: 1, max: 512)]
    #[Assert\Unique]
    public ?array $references = null;

    /**
     * @var Impact[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $impacts = null;

    /**
     * @var Metric[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $metrics = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $configurations = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $workarounds = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $solutions = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $exploits = null;

    /**
     * @var Timeline[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $timelines = null;

    /**
     * @var Credit[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $credits = null;

    #[Assert\Count(min: 1)]
    public ?array $source = null;

    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $tags = null;

    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $taxonomyMappings = null;

    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?\DateTimeImmutable $dateAssigned = null;

    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?\DateTimeImmutable $datePublic = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $rejectedReasons = null;

    /**
     * @var string[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All(
        constraints: [
            new Assert\Type('string'),
            new Assert\Regex('^CVE-[0-9]{4}-[0-9]{4,19}$'),
        ]
    )]
    public ?array $replacedBy = null;
}