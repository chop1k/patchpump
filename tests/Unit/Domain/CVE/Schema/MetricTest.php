<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\CVE\Schema;

use App\Tests\Common\Providers\Domain\CVE\Schema\MetricProvider;
use App\Tests\Common\SchemaTest;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @todo unique constraint
 */
final class MetricTest extends SchemaTest
{
    #[DataProvider('provideValidRules')]
    public function testValidRules(object $value): void
    {
        parent::testValidRules($value);
    }

    #[DataProvider('provideInvalidRules')]
    public function testInvalidRules(object $value): void
    {
        parent::testInvalidRules($value);
    }

    public static function provideValidRules(): iterable
    {
        return parent::mapRules(MetricProvider::provideValid());
    }

    public static function provideInvalidRules(): iterable
    {
        return parent::mapRules(MetricProvider::provideInvalid());
    }
}