<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers\Affected;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents object for affected routine name according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @see https://github.com/CVEProject/cve-schema
 * @see https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 * @see Affected
 *
 * @psalm-api
 */
final class AffectedRoutine
{
    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 4096)]
    public ?string $name = null;
}
