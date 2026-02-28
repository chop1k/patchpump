<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\Reference;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @psalm-api
 */
final class ReferenceTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(Reference $reference): void
    {
        $errors = $this->validator()->validate($reference);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(Reference $reference): void
    {
        $errors = $this->validator()->validate($reference);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): Reference
    {
        return new Reference();
    }

    /**
     * @return iterable<non-negative-int, Reference>
     */
    public static function successProvider(): iterable
    {
        $configuration = [
            'url' => [
                '123',
            ],
            'name' => [
                '123',
                null,
            ],
            'tags' => [
                [
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
                ],
                null,
            ],
        ];

        $factory = self::factory(...);

        $configuration = new ArrayConfiguration(
            $configuration,
        );

        return new ProviderFactory($factory, $configuration)
            ->cartesianProvider();
    }

    /**
     * @return iterable<non-negative-int, Reference>
     */
    public static function failureProvider(): iterable
    {
        $configuration = [
            'url' => [
                '123',
                null,
            ],
            'name' => [
                null,
                str_repeat('A', 513),
                '',
            ],
            'tags' => [
                null,
                [],
                [
                    null,
                ],
                [
                    123,
                ],
                [
                    '',
                ],
                [
                    str_repeat('A', 129),
                ],
                [
                    'a',
                ],
                [
                    '123',
                    '123',
                ],
            ],
        ];

        $factory = self::factory(...);

        $configuration = new ArrayConfiguration(
            $configuration,
        );

        return new ProviderFactory($factory, $configuration)
            ->ofatProvider();
    }
}
