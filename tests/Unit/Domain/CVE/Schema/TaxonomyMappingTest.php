<?php

namespace App\Tests\Unit\Domain\CVE\Schema;

use App\Domain\CVE\Schema\TaxonomyMapping;
use App\Tests\Common\Providers\CVE\TaxonomyMappingProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ValidatorBuilder;

class TaxonomyMappingTest extends TestCase
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
    public function testValidRules(TaxonomyMapping $mapping): void
    {
        $errors = $this->validator->validate($mapping);

        self::assertCount(0, $errors, $errors->__toString());
    }

    /**
     * @dataProvider provideInvalidRules
     */
    public function testInvalidRules(TaxonomyMapping $mapping): void
    {
        $errors = $this->validator->validate($mapping);

        self::assertNotCount(0, $errors, $errors->__toString());
    }

    public static function provideValidRules(): iterable
    {
        return array_map(
            static fn (TaxonomyMapping $mapping) => [$mapping],
            TaxonomyMappingProvider::provideValid(),
        );
    }

    public static function provideInvalidRules(): iterable
    {
        return array_map(
            static fn (TaxonomyMapping $mapping) => [$mapping],
            TaxonomyMappingProvider::provideInvalid(),
        );
    }
}