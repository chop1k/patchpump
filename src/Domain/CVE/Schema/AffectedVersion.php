<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents object for affected product version according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see Affected
 */
final class AffectedVersion
{
    #[Assert\Length(min: 1, max: 1024)]
    public ?string $version = null;

    #[Assert\Choice(['affected', 'unaffected', 'unknown'])]
    public ?string $status = null;

    #[Assert\Length(min: 1, max: 128)]
    public ?string $versionType = null;

    #[Assert\Length(min: 1, max: 1024)]
    public ?string $lessThan = null;

    #[Assert\Length(min: 1, max: 1024)]
    public ?string $lessThanOrEqual = null;

    /**
     * @var AffectedVersionChange[]|null
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    public ?array $changes = null;
}