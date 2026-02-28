<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\Description;
use App\Domain\CVE\Schema\DescriptionMedia;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @psalm-api
 */
final class DescriptionTest extends AbstractSchemaTestCase
{
    #[DataProvider('successProvider')]
    public function testValidationShouldBeSuccessful(Description $description): void
    {
        $errors = $this->validator()->validate($description);

        $this->assertValidationPassed($errors);
    }

    #[DataProvider('failureProvider')]
    public function testValidationShouldBeFailed(Description $description): void
    {
        $errors = $this->validator()->validate($description);

        $this->assertValidationFailed($errors);
    }

    private static function factory(): Description
    {
        return new Description();
    }

    /**
     * @return iterable<non-negative-int, Description>
     */
    public static function successProvider(): iterable
    {
        $media_1 = new DescriptionMedia();

        $media_1->type = 'plain\text';
        $media_1->base64 = false;
        $media_1->value = '123';

        $configuration = [
            'lang' => [
                'ru',
                'en',
            ],
            'value' => [
                '123',
            ],
            'supportingMedia' => [
                [
                    $media_1,
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
     * @return iterable<non-negative-int, Description>
     */
    public static function failureProvider(): iterable
    {
        $media_1 = new DescriptionMedia();

        $media_1->type = 'plain\text';
        $media_1->base64 = false;
        $media_1->value = '123';

        $media_2 = new DescriptionMedia();

        $media_2->type = 'plain\text';
        $media_2->base64 = false;
        $media_2->value = '';

        $configuration = [
            'lang' => [
                'ru',
                'us',
                null,
            ],
            'value' => [
                '123',
                str_repeat('A', 4097),
                '',
                null,
            ],
            'supportingMedia' => [
                null,
                [
                    $media_2,
                ],
                [
                    $media_1,
                    $media_1,
                ],
                [],
                [
                    null,
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
