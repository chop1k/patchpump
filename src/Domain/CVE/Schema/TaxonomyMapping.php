<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents taxonomy item object structure according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see CNA
 */
#[Assert\Cascade]
final class TaxonomyMapping
{
    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 128)]
    public ?string $taxonomyName = null;

    #[Assert\Length(min: 1, max: 128)]
    public ?string $taxonomyVersion = null;

    /**
     * @var TaxonomyRelation[]|null
     */
    #[Assert\NotNull]
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(TaxonomyRelation::class),
    ])]
    public ?array $taxonomyRelations = null;
}