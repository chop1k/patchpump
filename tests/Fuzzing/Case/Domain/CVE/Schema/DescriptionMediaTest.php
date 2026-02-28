<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\DescriptionMedia;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @psalm-api
 */
final class DescriptionMediaTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(DescriptionMedia $media): void
    {
        $errors = $this->validator()->validate($media);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(DescriptionMedia $media): void
    {
        $errors = $this->validator()->validate($media);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): DescriptionMedia
    {
        return new DescriptionMedia();
    }

    /**
     * @return iterable<non-negative-int, DescriptionMedia>
     */
    public static function successProvider(): iterable
    {
        $configuration = [
            'type' => [
                'text/html',
                '123',
            ],
            'base64' => [
                true,
                false,
            ],
            'value' => [
                '123',
                str_repeat('A', 4096),
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
     * @return iterable<non-negative-int, DescriptionMedia>
     */
    public static function failureProvider(): iterable
    {
        $configuration = [
            'type' => [
                'text/html',
                str_repeat('A', 4096),
                '',
                null,
            ],
            'base64' => [
                true,
            ],
            'value' => [
                '123',
                '',
                null,
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
