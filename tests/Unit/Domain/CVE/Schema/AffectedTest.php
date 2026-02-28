<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\CVE\Schema;

use App\Tests\Common\SchemaTest;
use Override;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @todo unique constraint
 *
 * @psalm-api
 */
final class AffectedTest extends SchemaTest
{
    #[Override]
    #[DataProvider('provideValidRules')]
    public function testValidRules(object $value): void
    {
        parent::testValidRules($value);
    }

    #[Override]
    #[DataProvider('provideInvalidRules')]
    public function testInvalidRules(object $value): void
    {
        parent::testInvalidRules($value);
    }

    public static function provideValidRules(): iterable
    {
        return parent::mapRules(
            provide_valid_affected(),
        );
    }

    public static function provideInvalidRules(): iterable
    {
        return parent::mapRules(
            provide_invalid_affected(),
        );
    }
}
