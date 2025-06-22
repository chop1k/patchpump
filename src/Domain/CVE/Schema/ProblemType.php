<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents wrapper for problem descriptions according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see CNA
 */
#[Assert\Cascade]
final class ProblemType
{
    /**
     * @var ProblemDescription[]|null
     */
    #[Assert\NotNull]
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(ProblemDescription::class),
    ])]
    public ?array $descriptions = null;
}