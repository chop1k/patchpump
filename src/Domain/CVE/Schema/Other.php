<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Metric;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents other metric type according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @see https://github.com/CVEProject/cve-schema
 * @see https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 * @see Metric
 *
 * @psalm-api
 */
final class Other
{
    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 128)]
    public ?string $type = null;

    /**
     * @var non-empty-array<string, mixed>|null $content
     */
    #[Assert\NotNull]
    #[Assert\NotBlank]
    public ?array $content = null;
}
