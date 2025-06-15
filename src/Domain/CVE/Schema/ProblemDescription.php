<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents problem description according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see ProblemType
 */
final class ProblemDescription
{
    #[Assert\NotNull]
    #[Assert\Regex('^[A-Za-z]{2,4}([_-][A-Za-z]{4})?([_-]([A-Za-z]{2}|[0-9]{3}))?$')]
    public ?string $lang = null;

    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 4096)]
    public ?string $description = null;

    #[Assert\Length(min: 5, max: 9)]
    #[Assert\Regex('^CWE-[1-9][0-9]*$')]
    public ?string $cweId = null;

    #[Assert\Length(min: 1, max: 128)]
    public ?string $type = null;

    /**
     * @var Reference[]|null
     */
    #[Assert\Count(min: 1, max: 512)]
    #[Assert\Unique]
    public ?array $references = null;
}