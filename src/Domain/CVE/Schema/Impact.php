<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents impact of the vulnerability according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @see https://github.com/CVEProject/cve-schema
 * @see https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 * @see CNA
 */
#[Assert\Cascade]
final class Impact
{
    #[Assert\Length(min: 7, max: 11)]
    #[Assert\Regex('^CAPEC-[1-9][0-9]{0,4}$^')]
    public ?string $capecId = null;

    /**
     * @var Description[]|null $descriptions
     */
    #[Assert\NotNull]
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(Description::class),
    ])]
    public ?array $descriptions = null;
}
