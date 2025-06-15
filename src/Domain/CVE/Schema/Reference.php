<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents reference according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see CNA
 */
final class Reference
{
    #[Assert\NotNull]
    public ?string $url = null;

    #[Assert\Length(min: 1, max: 512)]
    public ?string $name = null;

    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $tags = null;
}