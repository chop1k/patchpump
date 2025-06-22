<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents object for both published/rejected CNA and ADP according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see Record
 */
#[Assert\Cascade]
#[Assert\Expression(self::RULE_COMBINED)]
final class CNA
{
    private const RULE_1 = '(this.providerMetadata !== null && this.descriptions !== null && this.affected !== null && this.references !== null)';
    private const RULE_2 = '(this.providerMetadata !== null && this.rejectedReasons !== null)';
    private const RULE_3 = 'this.providerMetadata !== null';

    private const RULE_COMBINED = self::RULE_1 . ' || ' . self::RULE_2 . ' || ' . self::RULE_3;

    #[Assert\NotNull]
    public ?ProviderMetadata $providerMetadata = null;

    #[Assert\Length(min: 1, max: 256)]
    public ?string $title = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Description::class),
    ])]
    public ?array $descriptions = null;

    /**
     * @var Affected[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Affected::class),
    ])]
    public ?array $affected = null;

    /**
     * @var CPEApplicability[]|null
     */
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(CPEApplicability::class),
    ])]
    public ?array $cpeApplicability = null;

    /**
     * @var ProblemType[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(ProblemType::class),
    ])]
    public ?array $problems = null;

    /**
     * @var Reference[]|null
     */
    #[Assert\Count(min: 1, max: 512)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Reference::class),
    ])]
    public ?array $references = null;

    /**
     * @var Impact[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Impact::class),
    ])]
    public ?array $impacts = null;

    /**
     * @var Metric[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Metric::class),
    ])]
    public ?array $metrics = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Description::class),
    ])]
    public ?array $configurations = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Description::class),
    ])]
    public ?array $workarounds = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Description::class),
    ])]
    public ?array $solutions = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Description::class),
    ])]
    public ?array $exploits = null;

    /**
     * @var Timeline[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Timeline::class),
    ])]
    public ?array $timeline = null;

    /**
     * @var Credit[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Credit::class),
    ])]
    public ?array $credits = null;

    #[Assert\Count(min: 1)]
    public ?array $source = null;

    /**
     * @var string[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\AtLeastOneOf([
            new Assert\Sequentially([
                new Assert\NotNull(),
                new Assert\Type('string'),
                new Assert\Length(min: 2, max: 128),
                new Assert\Regex('^x_.*$^')
            ]),
            new Assert\Sequentially([
                new Assert\NotNull(),
                new Assert\Type('string'),
                new Assert\Choice([
                    'unsupported-when-assigned',
                    'exclusively-hosted-service',
                    'disputed'
                ])
            ]),
        ])
    ])]
    public ?array $tags = null;

    /**
     * @var TaxonomyMapping[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(TaxonomyMapping::class),
    ])]
    public ?array $taxonomyMappings = null;

    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?string $dateAssigned = null;

    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?string $datePublic = null;

    /**
     * @var Description[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Description::class),
    ])]
    public ?array $rejectedReasons = null;

    /**
     * @var string[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All(
        constraints: [
            new Assert\NotNull(),
            new Assert\Type('string'),
            new Assert\Regex('^CVE-[0-9]{4}-[0-9]{4,19}$^'),
        ]
    )]
    public ?array $replacedBy = null;
}