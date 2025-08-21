<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents single object for both published/rejected containers according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @see https://github.com/CVEProject/cve-schema
 * @see https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 * @see TextRecord
 */
#[Assert\Cascade]
final class RecordContainers
{
    #[Assert\NotNull]
    public ?CNA $cna = null;

    /**
     * @var CNA[]|null $adp
     */
    #[Assert\Count(min: 1)]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(CNA::class),
    ])]
    public ?array $adp = null;
}
