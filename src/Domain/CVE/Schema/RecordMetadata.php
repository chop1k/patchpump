<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents CVE record metadata object according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see Record
 */
#[Assert\When(
    expression: 'this.state === "PUBLISHED"',
    constraints: [
        new Assert\Expression('this.dateRejected === null')
    ]
)]
final class RecordMetadata
{
    #[Assert\NotNull]
//    #[Assert\Regex('^CVE-[0-9]{4}-[0-9]{4,19}$^')]
    public ?string $cveId = null;

    #[Assert\NotNull]
    #[Assert\Uuid]
    public ?string $assignerOrgId = null;

    #[Assert\Length(min: 2, max: 32)]
    public ?string $assignerShortName = null;

    #[Assert\Uuid]
    public ?string $requesterUserId = null;

    #[Assert\GreaterThanOrEqual(1)]
    public ?int $serial = null;

    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?string $datePublished = null;

    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?string $dateReserved = null;

    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?string $dateUpdated = null;

    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?string $dateRejected = null;

    #[Assert\NotNull]
    #[Assert\Choice(['PUBLISHED', 'REJECTED'])]
    public ?string $state = null;
}