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
final class Record
{
    #[Assert\NotNull]
    #[Assert\IdenticalTo('CVE_RECORD')]
    public ?string $dataType = null;

    #[Assert\NotNull]
    #[Assert\IdenticalTo('5.1.1')]
    public ?string $dataVersion = null;

    #[Assert\NotNull]
    public ?RecordMetadata $cveMetadata = null;

    #[Assert\NotNull]
    #[Assert\AtLeastOneOf([
        new Assert\When(
            expression: 'cveMetadata.state === "PUBLISHED"',
            constraints: [
                new Assert\Sequentially(
                    constraints: [
                        new Assert\Expression(
                            expression: 'containers.cna !== null'
                        ),
                        new Assert\Expression(
                            expression: 'containers.cna.providerMetadata !== null'
                        ),
                        new Assert\Expression(
                            expression: 'containers.cna.descriptions !== null'
                        ),
                        new Assert\Expression(
                            expression: 'containers.cna.affected !== null'
                        ),
                        new Assert\Expression(
                            expression: 'containers.cna.references !== null'
                        ),
                    ]
                ),
            ]
        ),
        new Assert\When(
            expression: 'cveMetadata.state === "REJECTED"',
            constraints: [
                new Assert\Sequentially(
                    constraints: [
                        new Assert\Expression(
                            expression: 'containers.adp === null'
                        ),
                        new Assert\Expression(
                            expression: 'containers.cna !== null'
                        ),
                        new Assert\Expression(
                            expression: 'containers.cna.providerMetadata !== null'
                        ),
                        new Assert\Expression(
                            expression: 'containers.cna.rejectedReasons !== null'
                        ),
                    ]
                ),
            ]
        )
    ])]
    public ?RecordContainers $containers = null;
}
