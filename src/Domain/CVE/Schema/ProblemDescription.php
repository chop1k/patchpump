<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents problem description according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @see https://github.com/CVEProject/cve-schema
 * @see https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 * @see ProblemType
 *
 * @psalm-api
 */
#[Assert\Cascade]
final class ProblemDescription
{
    #[Assert\NotNull]
    #[Assert\Language]
    public ?string $lang = null;

    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 4096)]
    public ?string $description = null;

    #[Assert\Length(min: 5, max: 9)]
    // todo: regex + tests
    //    #[Assert\Regex('^CWE-[1-9][0-9]*$^')]
    public ?string $cweId = null;

    #[Assert\Length(min: 1, max: 128)]
    public ?string $type = null;

    /**
     * @var non-empty-array<non-negative-int, Reference>|null $references
     */
    #[Assert\Count(min: 1, max: 512)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Reference::class),
    ])]
    public ?array $references = null;
}
