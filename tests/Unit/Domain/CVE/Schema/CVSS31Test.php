<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\CVE\Schema;

use App\Domain\CVE\Schema\CVSS31;
use App\Tests\Common\Providers\CVE\CVSS31Provider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ValidatorBuilder;

class CVSS31Test extends TestCase
{
    private ?ValidatorInterface $validator = null;

    protected function setUp(): void
    {
        $builder = new ValidatorBuilder();

        $builder->enableAttributeMapping();

        $this->validator = $builder->getValidator();
    }

    protected function tearDown(): void
    {
        $this->validator = null;
    }

    /**
     * @dataProvider provideValidRules
     */
    public function testValidRules(CVSS31 $cvss): void
    {
        $errors = $this->validator->validate($cvss);

        self::assertCount(0, $errors, $errors->__toString());
    }

    /**
     * @dataProvider provideInvalidRules
     */
    public function testInvalidRules(CVSS31 $cvss): void
    {
        $errors = $this->validator->validate($cvss);

        self::assertNotCount(0, $errors, $errors->__toString());
    }

    public static function provideValidRules(): iterable
    {
        return array_map(
            static fn (CVSS31 $cvss) => [$cvss],
            CVSS31Provider::provideValid(),
        );
    }

    public static function provideInvalidRules(): iterable
    {
        return array_map(
            static fn (CVSS31 $cvss) => [$cvss],
            CVSS31Provider::provideInvalid(),
        );
    }
}