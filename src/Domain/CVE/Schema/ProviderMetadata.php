<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents CVE provider metadata object according to MITRE CVE V5 schema.
 *
 * Provider metadata contains information about vulnerability information provider organization.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see CNA
 */
final class ProviderMetadata
{
    #[Assert\NotNull]
    #[Assert\Uuid]
    public ?string $orgId = null;

    #[Assert\Length(min: 2, max: 32)]
    public ?string $shortName = null;

    #[Assert\DateTime(format: \DateTimeInterface::ISO8601_EXPANDED)]
    public ?\DateTimeImmutable $dateUpdated = null;
}