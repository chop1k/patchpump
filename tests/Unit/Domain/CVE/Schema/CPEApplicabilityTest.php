<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\CVE\Schema;

use App\Domain\CVE\Schema\CPEApplicability;
use App\Tests\Common\Providers\CVE\CPEApplicabilityProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ValidatorBuilder;

class CPEApplicabilityTest extends TestCase
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
    public function testValidRules(CPEApplicability $applicability): void
    {
        $errors = $this->validator->validate($applicability);

        self::assertCount(0, $errors, $errors->__toString());
    }

    /**
     * @dataProvider provideInvalidRules
     */
    public function testInvalidRules(CPEApplicability $applicability): void
    {
        $errors = $this->validator->validate($applicability);

        self::assertNotCount(0, $errors, $errors->__toString());
    }

    public static function provideValidRules(): iterable
    {
        return array_map(
            static fn (CPEApplicability $applicability) => [$applicability],
            CPEApplicabilityProvider::provideValid(),
        );
    }

    public static function provideInvalidRules(): iterable
    {
        return array_map(
            static fn (CPEApplicability $applicability) => [$applicability],
            CPEApplicabilityProvider::provideInvalid(),
        );
    }
}