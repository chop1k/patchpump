<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents CVE record metadata object according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @see https://github.com/CVEProject/cve-schema
 * @see https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 * @see TextRecord
 */
#[Assert\When(
    expression: 'this.state === "PUBLISHED"',
    constraints: [
        new Assert\Expression('this.dateRejected === null'),
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

    #[Assert\AtLeastOneOf([
        new Assert\DateTime(format: Timestamp::FormatWithTz),
        new Assert\DateTime(format: Timestamp::Format),
    ])]
    public ?string $datePublished = null;

    #[Assert\AtLeastOneOf([
        new Assert\DateTime(format: Timestamp::FormatWithTz),
        new Assert\DateTime(format: Timestamp::Format),
    ])]
    public ?string $dateReserved = null;

    #[Assert\AtLeastOneOf([
        new Assert\DateTime(format: Timestamp::FormatWithTz),
        new Assert\DateTime(format: Timestamp::Format),
    ])]
    public ?string $dateUpdated = null;

    #[Assert\AtLeastOneOf([
        new Assert\DateTime(format: Timestamp::FormatWithTz),
        new Assert\DateTime(format: Timestamp::Format),
    ])]
    public ?string $dateRejected = null;

    #[Assert\NotNull]
    #[Assert\Choice(['PUBLISHED', 'REJECTED'])]
    public ?string $state = null;
}
