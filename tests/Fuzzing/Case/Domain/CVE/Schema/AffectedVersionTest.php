<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Case\Domain\CVE\Schema;

use App\Domain\CVE\Schema\AffectedVersion;
use App\Tests\Fuzzing\Common\Fuzzing\Configuration\ArrayConfiguration;
use App\Tests\Fuzzing\Common\Testing\AbstractSchemaTestCase;
use App\Tests\Fuzzing\Common\Testing\ProviderFactory;
use PHPUnit\Framework\Attributes\DataProvider;

final class AffectedVersionTest extends AbstractSchemaTestCase
{
    //    #[DataProvider('successProvider')]
    //    public function testValidationShouldBeSuccessful(AffectedVersion $version): void
    //    {
    //        $errors = $this->validator()->validate($version);
    //
    //        $this->assertValidationPassed($errors);
    //    }
    //
    //    #[DataProvider('failureProvider')]
    //    public function testValidationShouldBeFailed(AffectedVersion $version): void
    //    {
    //        $errors = $this->validator()->validate($version);
    //
    //        $this->assertValidationFailed($errors);
    //    }
    //
    //    private static function factory(): AffectedVersion
    //    {
    //        return new AffectedVersion();
    //    }
    //
    //    /**
    //     * @return iterable<non-negative-int, AffectedVersion>
    //     */
    //    public static function successProvider(): iterable
    //    {
    //
    //        $configuration = [
    //            'at' => [
    //            ],
    //            'status' => [
    //            ],
    //        ];
    //
    //        $factory = self::factory(...);
    //
    //        $configuration = new ArrayConfiguration(
    //            $configuration,
    //        );
    //
    //        return new ProviderFactory($factory, $configuration)
    //            ->cartesianProvider();
    //    }
    //
    //    /**
    //     * @return iterable<non-negative-int, AffectedVersion>
    //     */
    //    public static function failureProvider(): iterable
    //    {
    //        $configuration = [
    //        ];
    //
    //        $factory = self::factory(...);
    //
    //        $configuration = new ArrayConfiguration(
    //            $configuration,
    //        );
    //
    //        return new ProviderFactory($factory, $configuration)
    //            ->ofatProvider();
    //    }
}
