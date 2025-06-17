<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents credit object structure according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see CNA
 */
final class Credit
{
    #[Assert\NotNull]
    #[Assert\Regex('^[A-Za-z]{2,4}([_-][A-Za-z]{4})?([_-]([A-Za-z]{2}|[0-9]{3}))?$')]
    public ?string $lang = null;

    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 4096)]
    public ?string $value = null;

    #[Assert\Uuid]
    public ?string $user = null;

    #[Assert\Choice([
        'finder',
        'reporter',
        'analyst',
        'coordinator',
        'remediation developer',
        'remediation reviewer',
        'remediation verifier',
        'tool',
        'sponsor',
        'other'
    ])]
    public ?string $type = null;
}