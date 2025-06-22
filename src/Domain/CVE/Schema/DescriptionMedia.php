<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;


use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents object for describing media that attached to a description object according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see Description
 */
final class DescriptionMedia
{
    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 256)]
    public ?string $type = null;

    public bool $base64 = false;

    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 16384)]
    public ?string $value = null;
}