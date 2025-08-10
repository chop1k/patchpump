<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\CVE\Schema;

use App\Tests\Common\SchemaTest;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @todo unique constraint
 */
final class ReferenceTest extends SchemaTest
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
        return parent::mapRules(provide_valid_references());
    }

    public static function provideInvalidRules(): iterable
    {
        return parent::mapRules(provide_invalid_references());
    }
}
