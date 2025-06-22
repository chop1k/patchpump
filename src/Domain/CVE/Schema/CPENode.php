<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents CPE node according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see CPEApplicability
 */
#[Assert\Cascade]
final class CPENode
{
    #[Assert\NotNull]
    #[Assert\Choice(['AND', 'OR'])]
    public ?string $operator = null;

    public ?bool $negate = null;

    /**
     * @var CPEMatch[]|null
     */
    #[Assert\NotNull]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(CPEMatch::class),
    ])]
    public ?array $cpeMatch = null;
}