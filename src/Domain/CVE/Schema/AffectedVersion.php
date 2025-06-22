<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents object for affected product version according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see Affected
 */
#[Assert\Cascade]
#[Assert\Expression(self::RULE_COMBINED)]
final class AffectedVersion
{
    private const RULE_1 = '(this.versionType === null && this.lessThan === null && this.lessThanOrEqual === null)';
    private const RULE_2 = '(this.versionType !== null && this.lessThan === null && this.lessThanOrEqual === null)';
    private const RULE_3 = '(this.versionType !== null && this.lessThan !== null && this.lessThanOrEqual === null)';
    private const RULE_4 = '(this.versionType !== null && this.lessThan === null && this.lessThanOrEqual !== null)';
    private const RULE_5 = '(this.version !== null && this.status !== null && this.versionType === null && this.lessThan === null && this.lessThanOrEqual === null)';

    /**
     * @todo fix when there will be Assert\AtLeastOneOf attribute both for class and property
     */
    private const RULE_COMBINED = self::RULE_1 . ' || ' . self::RULE_2 . ' || ' . self::RULE_3 . ' || ' . self::RULE_4 . ' || ' . self::RULE_5;

    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 1024)]
    public ?string $version = null;

    #[Assert\NotNull]
    #[Assert\Choice(['affected', 'unaffected', 'unknown'])]
    public ?string $status = null;

    #[Assert\Length(min: 1, max: 128)]
    public ?string $versionType = null;

    #[Assert\Length(min: 1, max: 1024)]
    public ?string $lessThan = null;

    #[Assert\Length(min: 1, max: 1024)]
    public ?string $lessThanOrEqual = null;

    /**
     * @var AffectedVersionChange[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(AffectedVersionChange::class),
    ])]
    public ?array $changes = null;
}