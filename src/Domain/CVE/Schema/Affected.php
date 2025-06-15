<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents product affected by vulnerability according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see CNA
 */
final class Affected
{
    #[Assert\Length(min: 1, max: 512)]
    public ?string $vendor = null;

    #[Assert\Length(min: 1, max: 2048)]
    public ?string $product = null;

    public ?string $collectionURL = null;

    #[Assert\Length(min: 1, max: 2048)]
    public ?string $packageName = null;

    #[Assert\Unique]
    #[Assert\All(
        constraints: [
            new Assert\Type('string'),
            new Assert\Length(min: 1, max: 2048),
            new Assert\Regex('([c][pP][eE]:/[AHOaho]?(:[A-Za-z0-9._\\-~%]*){0,6})|(cpe:2\\.3:[aho*\\-](:(((\\?*|\\*?)([a-zA-Z0-9\\-._]|(\\\\[\\\\*?!\"#$%&\'()+,/:;<=>@\\[\\]\\^`{|}~]))+(\\?*|\\*?))|[*\\-])){5}(:(([a-zA-Z]{2,3}(-([a-zA-Z]{2}|[0-9]{3}))?)|[*\\-]))(:(((\\?*|\\*?)([a-zA-Z0-9\\-._]|(\\\\[\\\\*?!\"#$%&\'()+,/:;<=>@\\[\\]\\^`{|}~]))+(\\?*|\\*?))|[*\\-])){4})')
        ]
    )]
    public ?array $cpes = null;

    #[Assert\Unique]
    #[Assert\All(
        constraints: [
            new Assert\Type('string'),
            new Assert\Length(min: 1, max: 4096),
        ]
    )]
    public ?array $modules = null;

    #[Assert\Unique]
    #[Assert\All(
        constraints: [
            new Assert\Type('string'),
            new Assert\Length(min: 1, max: 1024),
        ]
    )]
    public ?array $programFiles = null;

    /**
     * @var AffectedRoutine[]|null
     */
    #[Assert\Unique]
    public ?array $programRoutines = null;

    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All(
        constraints: [
            new Assert\Type('string'),
            new Assert\Length(min: 1, max: 1024),
        ]
    )]
    public ?array $platforms = null;

    public ?string $repo = null;

    #[Assert\Choice(['affected', 'unaffected', 'unknown'])]
    public ?string $defaultStatus = null;

    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $versions = null;
}