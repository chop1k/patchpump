<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents product affected by vulnerability according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @see https://github.com/CVEProject/cve-schema
 * @see https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 * @see CNA
 */
#[Assert\Cascade]
#[Assert\Expression(self::RULE_COMBINED)]
final class Affected
{
    private const RULE_1 = '(this.vendor !== null && this.product !== null)';
    private const RULE_2 = '(this.collectionURL !== null && this.packageName !== null)';
    private const RULE_3 = '(this.versions !== null || this.defaultStatus !== null)';

    /**
     * @todo fix when there will be Assert\AtLeastOneOf attribute both for class and property
     */
    private const RULE_COMBINED = '('.self::RULE_1.' || '.self::RULE_2.') && '.self::RULE_3;

    #[Assert\Length(min: 1, max: 512)]
    public ?string $vendor = null;

    #[Assert\Length(min: 1, max: 2048)]
    public ?string $product = null;

    #[Assert\Length(min: 1, max: 2048)]
    public ?string $collectionURL = null;

    #[Assert\Length(min: 1, max: 2048)]
    public ?string $packageName = null;

    /**
     * @var string[]|null $cpes
     */
    #[Assert\Unique]
    #[Assert\All(
        constraints: [
            new Assert\NotNull(),
            new Assert\Type('string'),
            new Assert\Length(min: 1, max: 2048),
            //            new Assert\Regex('([c][pP][eE]:/[AHOaho]?(:[A-Za-z0-9._\\-~%]*){0,6})|(cpe:2\\.3:[aho*\\-](:(((\\?*|\\*?)([a-zA-Z0-9\\-._]|(\\\\[\\\\*?!\"#$%&\'()+,/:;<=>@\\[\\]\\^`{|}~]))+(\\?*|\\*?))|[*\\-])){5}(:(([a-zA-Z]{2,3}(-([a-zA-Z]{2}|[0-9]{3}))?)|[*\\-]))(:(((\\?*|\\*?)([a-zA-Z0-9\\-._]|(\\\\[\\\\*?!\"#$%&\'()+,/:;<=>@\\[\\]\\^`{|}~]))+(\\?*|\\*?))|[*\\-])){4})')
        ]
    )]
    public ?array $cpes = null;

    /**
     * @var string[]|null $modules
     */
    #[Assert\Unique]
    #[Assert\All(
        constraints: [
            new Assert\NotNull(),
            new Assert\Type('string'),
            new Assert\Length(min: 1, max: 4096),
        ]
    )]
    public ?array $modules = null;

    /**
     * @var string[]|null $programFiles
     */
    #[Assert\Unique]
    #[Assert\All(
        constraints: [
            new Assert\NotNull(),
            new Assert\Type('string'),
            new Assert\Length(min: 1, max: 1024),
        ]
    )]
    public ?array $programFiles = null;

    /**
     * @var AffectedRoutine[]|null $programRoutines
     */
    #[Assert\Unique]
    #[Assert\All(
        constraints: [
            new Assert\NotNull(),
            new Assert\Type(AffectedRoutine::class),
        ]
    )]
    public ?array $programRoutines = null;

    /**
     * @var string[]|null $platforms
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All(
        constraints: [
            new Assert\NotNull(),
            new Assert\Type('string'),
            new Assert\Length(max: 1024),
        ]
    )]
    public ?array $platforms = null;

    #[Assert\Length(min: 1, max: 2048)]
    public ?string $repo = null;

    #[Assert\Choice(['affected', 'unaffected', 'unknown'])]
    public ?string $defaultStatus = null;

    /**
     * @var AffectedVersion[]|null $versions
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All(
        constraints: [
            new Assert\NotNull(),
            new Assert\Type(AffectedVersion::class),
        ]
    )]
    public ?array $versions = null;
}
