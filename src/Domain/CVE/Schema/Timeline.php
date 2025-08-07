<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents timeline object structure according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @see https://github.com/CVEProject/cve-schema
 * @see https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 * @see CNA
 */
final class Timeline
{
    #[Assert\NotNull]
    #[Assert\AtLeastOneOf([
        new Assert\DateTime(format: Timestamp::FormatWithTz),
        new Assert\DateTime(format: Timestamp::Format),
    ])]
    public ?string $time = null;

    #[Assert\NotNull]
    #[Assert\Language]
    public ?string $lang = null;

    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 4096)]
    public ?string $value = null;
}
