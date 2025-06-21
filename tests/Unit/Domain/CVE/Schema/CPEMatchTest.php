<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\CVE\Schema;

use App\Domain\CVE\Schema\CPEMatch;
use App\Tests\Common\Providers\CVE\CPEMatchProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ValidatorBuilder;

class CPEMatchTest extends TestCase
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
    public function testValidRules(CPEMatch $match): void
    {
        $errors = $this->validator->validate($match);

        self::assertCount(0, $errors, $errors->__toString());
    }

    /**
     * @dataProvider provideInvalidRules
     */
    public function testInvalidRules(CPEMatch $match): void
    {
        $errors = $this->validator->validate($match);

        self::assertNotCount(0, $errors, $errors->__toString());
    }

    public static function provideValidRules(): iterable
    {
        return array_map(
            static fn (CPEMatch $match) => [$match],
            CPEMatchProvider::provideValid(),
        );
    }

    public static function provideInvalidRules(): iterable
    {
        return array_map(
            static fn (CPEMatch $match) => [$match],
            CPEMatchProvider::provideInvalid(),
        );
    }
}