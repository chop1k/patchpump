<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents CVE record object according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 */
#[Assert\Cascade]
#[Assert\When(
    expression: 'this.cveMetadata?.state === "PUBLISHED"',
    constraints: [
        new Assert\Expression(self::RULE_FOR_PUBLISHED)
    ]
)]
#[Assert\When(
    expression: 'this.cveMetadata?.state === "REJECTED"',
    constraints: [
        new Assert\Expression(self::RULE_FOR_REJECTED)
    ]
)]
final class Record
{
    private const RULE_FOR_PUBLISHED = 'this.containers?.cna !== null && this.containers?.cna?.providerMetadata !== null && this.containers?.cna?.affected !== null && this.containers?.cna?.references !== null';
    private const RULE_FOR_REJECTED = 'this.containers?.adp === null && this.containers?.cna !== null && this.containers?.cna?.providerMetadata !== null && this.containers?.cna?.rejectedReasons !== null';

    #[Assert\NotNull]
    #[Assert\IdenticalTo('CVE_RECORD')]
    public ?string $dataType = null;

    #[Assert\NotNull]
    #[Assert\IdenticalTo('5.1.1')]
    public ?string $dataVersion = null;

    #[Assert\NotNull]
    public ?RecordMetadata $cveMetadata = null;

    #[Assert\NotNull]
    public ?RecordContainers $containers = null;
}
