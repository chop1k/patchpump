<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents reference according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @see https://github.com/CVEProject/cve-schema
 * @see https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 * @see CNA
 *
 * @psalm-api
 */
final class Reference
{
    #[Assert\NotNull]
    public ?string $url = null; // todo: url assertion + tests

    #[Assert\Length(min: 1, max: 512)]
    public ?string $name = null;

    /**
     * @var non-empty-array<non-negative-int, non-empty-string>|null $tags
     */
    #[Assert\Count(min: 1)]
    #[Assert\Unique]
    #[Assert\All([
        new Assert\AtLeastOneOf([
            new Assert\Sequentially([
                new Assert\NotNull(),
                new Assert\Type('string'),
                new Assert\Length(min: 2, max: 128),
                // todo: regex + tests
                //                new Assert\Regex('^x_.*$')
            ]),
            new Assert\Sequentially([
                new Assert\NotNull(),
                new Assert\Type('string'),
                new Assert\Choice([
                    'broken-link',
                    'customer-entitlement',
                    'exploit',
                    'government-resource',
                    'issue-tracking',
                    'mailing-list',
                    'mitigation',
                    'not-applicable',
                    'patch',
                    'permissions-required',
                    'media-coverage',
                    'product',
                    'related',
                    'release-notes',
                    'signature',
                    'technical-description',
                    'third-party-advisory',
                    'vendor-advisory',
                    'vdb-entry',
                ]),
            ]),
        ]),
    ])]
    public ?array $tags = null;
}
