<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents metric container according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @see https://github.com/CVEProject/cve-schema
 * @see https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 * @see CNA
 */
#[Assert\Cascade]
#[Assert\Expression(
    'this.cvssV4_0 !== null || this.cvssV3_1 !== null || this.cvssV3_0 !== null || this.cvssV2_0 !== null || this.other !== null'
)]
final class Metric
{
    #[Assert\Length(min: 1, max: 64)]
    public ?string $format = null;

    /**
     * @var MetricScenario[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(MetricScenario::class),
    ])]
    public ?array $scenarios = null;

    public ?CVSS40 $cvssV4_0 = null;

    public ?CVSS31 $cvssV3_1 = null;

    public ?CVSS30 $cvssV3_0 = null;

    public ?CVSS20 $cvssV2_0 = null;

    public ?Other $other = null;
}
