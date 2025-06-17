<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents taxonomy relation object structure according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see TaxonomyMapping
 */
final class TaxonomyRelation
{
    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 2048)]
    public ?string $taxonomyId = null;

    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 128)]
    public ?string $relationshipName = null;

    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 2048)]
    public ?string $relationshipValue = null;
}