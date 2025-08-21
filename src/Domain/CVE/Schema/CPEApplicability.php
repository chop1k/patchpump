<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents affected product defined as CPE according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @see https://github.com/CVEProject/cve-schema
 * @see https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 * @see CNA
 */
#[Assert\Cascade]
final class CPEApplicability
{
    #[Assert\Choice(['AND', 'OR'])]
    public ?string $operator = null;

    public ?bool $negate = null;

    /**
     * @var CPENode[]|null $nodes
     */
    #[Assert\NotNull]
    #[Assert\All([
        new Assert\NotNull(),
        new Assert\Type(CPENode::class),
    ])]
    public ?array $nodes = null;
}
